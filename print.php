<?php
require('fpdf/fpdf.php');
require ('koneksi.php');
require ('function.php');

//membuat objek baru bernama pdf dari class FPDF
$pdf = new FPDF('l','mm','A4');

//membuat halaman baru 

$pdf -> AddPage();
$pdf -> SetFont('Arial', 'B', 16);

//Judul
$pdf -> Cell (70,50,'Laporan Penerimaan',0,1,'C');

//Judul Table
$pdf -> SetFont('Arial','B',10);
$pdf -> Cell(8,6,'No',1,0,'C');
$pdf -> Cell(30,6,'Tanggal',1,0,'C');
$pdf -> Cell(30,6,'Proyek',1,0,'C');
$pdf -> Cell(30,6,'Rekanan',1,0,'C');
$pdf -> Cell(30,6,'Sumberdana',1,0,'C');
$pdf -> Cell(30,6,'Kode',1,0,'C');
$pdf -> Cell(30,6,'Rate',1,0,'C');
$pdf -> Cell(30,6,'Debet(Masuk)',1,0,'C');
$pdf -> Cell(30,6,'Kredit(Keluar)',1,0,'C');
$pdf -> Cell(30,6,'Uraian',1,0,'C');

$pdf -> SetFont('Arial','B',10);
$no=1;
$query = "SELECT * FROM penerimaan_kas WHERE id_penerimaan BETWEEN '$_POST[from]' AND '$_POST[to]' ";
$tampil = mysqli_query ($conn,$query);

while ($hasil = mysqli_fetch_array($tampil)){
    $pdf -> Cell(8,6,$no++,1,0,'C');
    $pdf -> Cell(30,6,$hasil['tanggal'],1,0,'C');
    $pdf -> Cell(30,6,$hasil['no_invoice'],1,0,'C');
    $pdf -> Cell(30,6,$hasil['nama'],1,0,'C');
    $pdf -> Cell(30,6,$hasil['nama_diterima'],1,0,'C');
    $pdf -> Cell(30,6,$hasil['noRekening'],1,0,'C');
    
}


$pdf -> Output();
