<?php
//-------------------------------------------------------------//
//                    LAPORAN PENGELUARAN                       //
//-------------------------------------------------------------//
require('fpdf/fpdf.php');
require ('koneksi.php');
require ('function.php');
 
class FPDF_AutoWrapTable extends FPDF {
  	private $data = array();
  	private $options = array(
  		'filename' => '',
  		'destinationfile' => '',
  		'paper_size'=>'F4',
  		'orientation'=>'P',
  	);
 
  	function __construct($data = array(), $options = array()) {
    	parent::__construct();
    	$this->data = $data;
    	$this->options = $options;
	}
 
	public function rptDetailData () {
		//
		$border = 0;
		$this->AddPage();
		$this->SetAutoPageBreak(true,60);
		$this->AliasNbPages();
		$left = 25;
 
		//header
        $this->Image('src/image/NEW-LOGO-KSS.png', 935,20,45,20);
		$this->SetFont("", "B", 15);
		$this->MultiCell(0, 12, 'PT. Koprima Sandy Sejahtera');
		$this->Cell(0, 1, " ", "B");
		$this->Ln(20);
		$this->SetFont("", "B", 12);
		$this->SetX(20); $this->Cell(0, 10, 'LAPORAN PENERIMAAN', 0, 1,'C');
		$this->Ln(40);
        $this->SetFont("", "B", 10);
        $this->SetX (100); $this -> Cell (138,1,'Periode '. $_POST['from'].' s/d '.$_POST['to'],0,1,'R');
        $this->Ln(10);
        $this->SetLeftMargin(100,20);
		$h = 20;
		$left = 40;
		$top = 80;	
		#tableheader
        $this->SetFont('Arial','B',10);
		$this->SetFillColor(200,200,200);	
		$left = $this->GetX();
		$this->Cell(20,$h,'NO',1,0,'L',true);
		$this->SetX($left += 20); $this->Cell(75, $h, 'Tanggal', 1, 0, 'C',true,);
		$this->SetX($left += 75); $this->Cell(100, $h, 'Invoice', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Proyek', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Rekanan', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Sumber Dana', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Debit (Masuk)', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(100, $h, 'Kredit (Keluar)', 1, 0, 'C',true);
		$this->SetX($left += 100); $this->Cell(150, $h, 'Uraian', 1, 1, 'C',true,);
		// $this->Ln(2);
 
		$this->SetFont('Arial','',9);
		$this->SetWidths(array(20,75,100,100,100,100,100,100,150));
		$this->SetAligns(array('C','L','L','L','L','L','L','L','L'));
		$no = 1; $this->SetFillColor(255);
		foreach ($this->data as $baris) {
			$data1=$baris['kode_bank'];
    		$data2=$baris['no_rekening'];
    		$mergeData= $data1." - ".$data2;
			$this->Row(
				array($no++, 
				$baris['tanggal'], 
				$baris['no_invoice'], 
				$baris['nama'], 
				$baris['nama_dibayar'], 
				$mergeData,
				$debit = 'Rp ' . number_format('00', 2, ',', '.'), 
				$kredit = 'Rp ' . number_format($baris['total_pengeluaran'], 2, ',', '.'),
				$baris['uraian']
			));
		}
	}

	public function printPDF () {

        if ($this->options['paper_size'] == "F4") {
            $a = 8.3 * 72; //1 inch = 72 pt
            $b = 13.0 * 72;
            parent::__construct($this->options['orientation'], "pt", array($a,$b));
        } else {
            parent::__construct($this->options['orientation'], "pt", $this->options['paper_size']);
        }
    
        $this->SetAutoPageBreak(false);
        $this->AliasNbPages();
        $this->SetFont("helvetica", "B", 10);
        //$this->AddPage();
    
        $this->rptDetailData();
    
        $this->Output($this->options['filename'],$this->options['destinationfile']);
    }
    
 
  	private $widths;
	private $aligns;

 
	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}
 
	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
 
	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=20*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,15,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}
 
	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}
 
	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}
} //end of class
 
/* contoh penggunaan dengan data diambil dari database mysql
 * 
 * 1. buatlah database di mysql
 * 2. buatlah tabel 'keuangan' dengan field: yang ada di code atas
 * 3. isikan beberapa contoh data ke tabel pegawai tersebut.
 * 
 * */
 
#ambil data dari DB dan masukkan ke array
$data = array();
$query = "SELECT * FROM pengeluaran_kas LEFT JOIN proyek ON pengeluaran_kas.proyek = proyek.id WHERE tanggal BETWEEN DATE_FORMAT('$_POST[from]','%Y-%m-%d') AND DATE_FORMAT('$_POST[to]','%Y-%m-%d')";
$sql = mysqli_query ($conn,$query);
while ($row = mysqli_fetch_array($sql)) {
	array_push($data, $row);
}
 
//pilihan
$options = array(
	'filename' => 'laporan-pengeluaran', //nama file penyimpanan, kosongkan jika output ke browser
	'destinationfile' => 'I', //I=inline browser (default), F=local file, D=download
	'paper_size'=>'Legal',	//paper size: F4, A3, A4, A5, Letter, Legal
	'orientation'=>'L', //orientation: P=portrait, L=landscape
);
 
$tabel = new FPDF_AutoWrapTable($data, $options);
$tabel->printPDF();
?>
