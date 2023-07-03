<?php
include('../../System/config.php');
require_once("../../assets/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$tglnow = date('d - m - Y');

$dari = $_GET['dari'];
$hingga = $_GET['hingga'];
$poli = $_GET['poli'];

$sqlpoli = mysqli_query($con, "SELECT * FROM poli WHERE poli_id = '$poli'");
$datapoli = mysqli_fetch_assoc($sqlpoli);

if ($poli == '' || $poli == '1') {
    $sql = mysqli_query($con, "SELECT * FROM kunjungan, penanganan, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_id = penanganan.penanganan_kunjungan AND kunjungan.kunjungan_tanggal BETWEEN '$dari' AND '$hingga' ORDER BY kunjungan.kunjungan_id DESC");
} else {
    $sql = mysqli_query($con, "SELECT * FROM kunjungan, penanganan, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_id = penanganan.penanganan_kunjungan AND kunjungan.kunjungan_poli_id = '$poli' AND kunjungan.kunjungan_tanggal BETWEEN '$dari' AND '$hingga' ORDER BY kunjungan.kunjungan_id DESC");
}

$path = '../../assets/img/kop.jpg';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);


$html = '<center><img src="../../assets/img/kop.jpg" width="1000px"></center>';
$html .= '<center><h3 style="font-family:sans-serif; margin-bottom: -10px;">Laporan Kunjungan</h3></center>';

if ($poli != '') {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: -10px;">' . $datapoli['poli_nama'] . '</h3></center>';
} else {
    $html .= '<center><h3 style="font-family:sans-serif; margin-bottom: -10px;">Semua Poli</h3></center>';
}


$html .= '<center><h5 style="font-family: Arial, Helvetica, sans-serif;">Dari : ' . $dari . ' - Hingga : ' . $hingga . '</h5></center><hr/><br/>';
$html .= '<table border="1" cellpadding="2" cellspacing="0" width="100%">
 <tr style="font-family:sans-serif; font-size:10px">
 <th>No.</th>
 <th>Nama Pasien</th>
 <th>Jenis Kelamin</th>
 <th>Tanggal lahir</th>
 <th>Poli</th>
 <th>Waktu Kunjungan</th>
 <th>Status</th>
 <th>Paramedis</th>
 <th>Keluhan</th>
 <th>Kesimpulan</th>
 <th>Pengobatan</th>
 <th>Ket.</th>
 </tr>';
$no = 1;
while ($data = mysqli_fetch_array($sql)) {
    $param = '';
    if ($data['kunjungan_paramedis'] == 0) {
        $param = '-';
    } else {
        $idparam = $data['kunjungan_paramedis'];
        $sqlparam = mysqli_query($con, "SELECT * FROM paramedis WHERE paramedis_id = '$idparam'");
        $dataparam = mysqli_fetch_array($sqlparam);
        $param = $dataparam['paramedis_nama'];
    }

    $html .= "<tr style='font-family:sans-serif; font-size:10px'>
 <td>" . $no . ".</td>
 <td>" . $data['kunjungan_pasien_nama'] . "</td>
 <td>" . $data['kunjungan_pasien_jk'] . "</td>
 <td>" . date('d-m-Y', strtotime($data['kunjungan_pasien_tgl_lahir'])) . "</td>
 <td>" . $data['poli_nama'] . "</td>
 <td>" . date('d-m-Y', strtotime($data['kunjungan_tanggal'])) . " - " . $data['kunjungan_jam'] . "</td>
 <td>" . $data['kunjungan_status'] . "</td>
 <td>" . $param . "</td>
 <td>" . $data['penanganan_keluhan'] . "</td>
 <td>" . $data['penanganan_kesimpulan'] . "</td>
 <td>" . $data['penanganan_pengobatan'] . "</td>
 <td>" . $data['penanganan_ket'] . "</td>
 </tr>";
    $no++;
}

$html .= '<p align="right" style="font-family:sans-serif; margin-right: 70px"><b><br><br><br><br>Kepala Puskesmas Lewolaga<br><br><br><br><br><br> Wilrida Heliana Keron, Amd.Kep</b></p>';

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'landscape');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('report-paramedis.pdf', array("Attachment" => false));
