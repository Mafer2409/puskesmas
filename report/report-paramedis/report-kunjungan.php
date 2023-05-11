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
$pdf->Cell(35, 5, 'Nama Pasien', 1, 0);
$pdf->Cell(20, 5, 'Jenis Kelamin', 1, 0);
$pdf->Cell(10, 5, 'Umur', 1, 0);
$pdf->Cell(35, 5, 'Waktu Kunjungan', 1, 0);
$pdf->Cell(40, 5, 'Paramedis', 1, 0);
$pdf->Cell(30, 5, 'Keluhan', 1, 0);
$pdf->Cell(40, 5, 'Kesimpulan', 1, 0);
$pdf->Cell(40, 5, 'Pengobatan', 1, 1);

$pdf->SetFont('Arial', '', 8);
$no = 1;

$sql = mysqli_query($con, "SELECT * FROM kunjungan, penanganan WHERE kunjungan.kunjungan_id = penanganan.penanganan_kunjungan AND kunjungan.kunjungan_tanggal BETWEEN '$dari' AND '$hingga' ORDER BY kunjungan.kunjungan_id DESC");

while ($data = mysqli_fetch_assoc($sql)) {
    $pdf->Cell(1, 5, '', 0, 0);
    $pdf->Cell(6, 5, $no++ . '.', 1, 0);
    $pdf->Cell(35, 5, $data['kunjungan_pasien_nama'], 1, 0);
    $pdf->Cell(20, 5, $data['kunjungan_pasien_jk'], 1, 0);
    $pdf->Cell(10, 5, $data['kunjungan_pasien_umur'], 1, 0);
    $pdf->Cell(35, 5, $data['kunjungan_tanggal'] . ' - ' . $data['kunjungan_jam'], 1, 0);

    $idparam = $data['kunjungan_paramedis'];
    if ($idparam == 0) {
        $pdf->Cell(40, 5, '-', 1, 0);
    } else {
        $sqlparam = mysqli_query($con, "SELECT * FROM paramedis WHERE paramedis_id = '$idparam' LIMIT 1");
        $dataparam = mysqli_fetch_assoc($sqlparam);
        $pdf->Cell(40, 5, $dataparam['paramedis_nama'], 1, 0);
    }

    $pdf->MultiCell(30, 5, $data['penanganan_keluhan'], 1, 0);
    $pdf->MultiCell(40, 5, $data['penanganan_kesimpulan'], 1, 1);
    $pdf->Cell(40, 5, $data['penanganan_pengobatan'], 1, 1);
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
