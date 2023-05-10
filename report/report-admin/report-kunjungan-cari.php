<?php
ob_start();
require('../../assets/fpdf16/fpdf.php');

include '../../System/config.php';

$tglnow = date('d - m - Y');

$dari = $_GET['dari'];
$hingga = $_GET['hingga'];

$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

//$pdf->Image('../../img/lanscape.jpg', 2, 2, 300, 50);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 0);
$pdf->Cell(115, 5, 'Dari : ' . $dari . '- Hingga : ' . $hingga, 0, 1);

$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Arial', '', 8);
$pdf->Cell(1, 5, '', 0, 0);
$pdf->Cell(6, 5, 'No.', 1, 0);
$pdf->Cell(55, 5, 'Nama Pasien', 1, 0);
$pdf->Cell(20, 5, 'Jenis Kelamin', 1, 0);
$pdf->Cell(10, 5, 'Umur', 1, 0);
$pdf->Cell(40, 5, 'Waktu Kunjungan', 1, 0);
$pdf->Cell(25, 5, 'Ket', 1, 0);
$pdf->Cell(55, 5, 'Admin', 1, 0);
$pdf->Cell(55, 5, 'Paramedis', 1, 1);

$pdf->SetFont('Arial', '', 8);
$no = 1;

$sql = mysqli_query($con, "SELECT * FROM kunjungan, admin WHERE kunjungan.kunjungan_admin = admin.admin_id AND kunjungan.kunjungan_tanggal BETWEEN '$dari' AND '$hingga' ORDER BY kunjungan.kunjungan_id DESC");

while ($data = mysqli_fetch_assoc($sql)) {
    $pdf->Cell(1, 5, '', 0, 0);
    $pdf->Cell(6, 5, $no++ . '.', 1, 0);
    $pdf->Cell(55, 5, $data['kunjungan_pasien_nama'], 1, 0);
    $pdf->Cell(20, 5, $data['kunjungan_pasien_jk'], 1, 0);
    $pdf->Cell(10, 5, $data['kunjungan_pasien_umur'], 1, 0);
    $pdf->Cell(40, 5, $data['kunjungan_tanggal'] . ' - ' . $data['kunjungan_jam'], 1, 0);
    $pdf->Cell(25, 5, $data['kunjungan_status'], 1, 0);
    $pdf->Cell(55, 5, $data['admin_nama'], 1, 0);

    $idparam = $data['kunjungan_paramedis'];
    if ($idparam == 0) {
        $pdf->Cell(55, 5, '-', 1, 1);
    } else {
        $sqlparam = mysqli_query($con, "SELECT * FROM paramedis WHERE paramedis_id = '$idparam' LIMIT 1");
        $dataparam = mysqli_fetch_assoc($sqlparam);
        $pdf->Cell(55, 5, $data['paramedis_nama'], 1, 1);
    }
}

// $sqlkades = mysqli_query($con, "SELECT * FROM kepala_desa LIMIT 1");
// $datakades = mysqli_fetch_assoc($sqlkades);

$pdf->SetFont('Times', '', 8);

$pdf->Cell(189, 10, '', 0, 1);
$pdf->Cell(189, 10, '', 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 0);
$pdf->Cell(115, 5, 'Lewolaga, ' . $tglnow, 0, 1);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 0);
$pdf->Cell(110, 5, 'Kepala Puskesmas Lewolaga', 0, 1);

$pdf->Cell(189, 20, '', 0, 1);
// $pdf->Image('../../img/' . $datakades['kepala_desa_ttd'], 125, 140, 40, 20);

$pdf->SetFont('Times', '', 10);
$pdf->Cell(190, 0);
$pdf->Cell(120, 5, "Nama Kepala Puskesmas", 0, 1);

$pdf->Output();

ob_end_flush();
//-------------------------------------------------------------------------------------------------------------------------
