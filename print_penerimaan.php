<?php
ob_start();
require('fpdf/fpdf.php');
require ('koneksi.php');
require ('function.php');



ob_clean();
//membuat objek baru bernama pdf dari class FPDF
$pdf = new FPDF('l','mm','A4');

//membuat halaman baru 

$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 16);

//Judul
$pdf -> Cell (70,8,'Laporan Penerimaan Kas',0,1,'L');
$pdf -> SetFont('Arial', '', 10);
$pdf -> Cell (70,10,'PT. Koprima Sandy Sejahtera',0,1,'L');
$pdf -> SetFont('Arial', 'B', 11);
$pdf -> Cell (270,9,'Periode '. $_POST['from'].' s/d '.$_POST['to'],0,1,'R');
$pdf->Image('src/image/NEW-LOGO-KSS.png', 247,13,30,10);

//Judul Table
$pdf -> SetFont('Arial','B',8);
$pdf -> Cell(8,6,'No',1,0,'C');
$pdf -> Cell(20,6,'Tanggal',1,0,'C');
$pdf -> Cell(15,6,'Proyek',1,0,'C');
$pdf -> Cell(30,6,'Rekanan',1,0,'C');
$pdf -> Cell(30,6,'Pembayaran',1,0,'C');
$pdf -> Cell(40,6,'Sumberdana',1,0,'C');
$pdf -> Cell(20,6,'Kode',1,0,'C');
$pdf -> Cell(20,6,'Rate',1,0,'C');
$pdf -> Cell(30,6,'Debet(Masuk)',1,0,'C');
$pdf -> Cell(30,6,'Kredit(Keluar)',1,0,'C');
$pdf -> Cell(30,6,'Uraian',1,0,'C');
$pdf->Ln();

$pdf -> SetFont('Arial','',7);
$no=1;
$query = "SELECT * FROM penerimaan_kas LEFT JOIN proyek ON penerimaan_kas.proyek = proyek.id WHERE tanggal BETWEEN DATE_FORMAT('$_POST[from]','%Y-%m-%d') AND DATE_FORMAT('$_POST[to]','%Y-%m-%d')";

$tampil = mysqli_query ($conn,$query);

while ($hasil = mysqli_fetch_array($tampil)){
    $pdf -> Cell(8,6,$no++,1,0,'C');
    $pdf -> Cell(20,6,$hasil['tanggal'],1,0,'C');
    $pdf -> Cell(15,6,$hasil['nama'],1,0,'C');
    $pdf -> Cell(30,6,$hasil['nama_diterima'],1,0,'C');
    $pdf -> Cell(30,6,$hasil['caraBayar'],1,0,'C');
    $pdf -> Cell(40,6,$hasil['noRekening'],1,0,'C');
    $pdf -> Cell(20,6,'IDR',1,0,'C');
    $pdf -> Cell(20,6,'1.00',1,0,'C');
    $pdf -> Cell(30,6,number_format($hasil['total_bayar']),1,0,'C');
    $pdf -> Cell(30,6,'0,00',1,0,'C');
    $pdf -> Cell(30,6,$hasil['uraian'],1,0,'C');
    $pdf->Ln();
} 


$pdf -> Output();
ob_end_flush();

?>
