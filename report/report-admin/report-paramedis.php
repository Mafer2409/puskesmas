<?php
ob_start();
require('../../assets/fpdf16/fpdf.php');

include '../../System/config.php';

$tglnow = date('d - m - Y');


$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AddPage();

//$pdf->Image('../../img/lanscape.jpg', 2, 2, 300, 50);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(80, 0);
$pdf->Cell(115, 5, 'Data Paramedis', 0, 1);

$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1, 5, '', 0, 0);
$pdf->Cell(6, 5, 'No.', 1, 0);
$pdf->Cell(55, 5, 'Nama Paramedis', 1, 0);
$pdf->Cell(50, 5, 'E-Mail', 1, 1);

$pdf->SetFont('Arial', '', 8);
$no = 1;

$sql = mysqli_query($con, "SELECT * FROM paramedis");

while ($data = mysqli_fetch_assoc($sql)) {
    $pdf->Cell(1, 5, '', 0, 0);
    $pdf->Cell(6, 5, $no++ . '.', 1, 0);
    $pdf->Cell(55, 5, $data['paramedis_nama'], 1, 0);
    $pdf->Cell(50, 5, $data['paramedis_email'], 1, 0);
}

// $sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
// $datakades = mysqli_fetch_assoc($sqlkades);

$pdf->SetFont('Times', '', 8);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(115, 5, 'Lewolaga, ' . $tglnow, 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(110, 5, 'Kepala Puskesmas Lewolaga', 0, 1);

$pdf->Cell(189, 20, '', 0, 1);
// $pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(120, 0);
$pdf->Cell(120, 5, "Nama Kepala Puskesmas", 0, 1);

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
