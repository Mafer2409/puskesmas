<?php
include('../../System/config.php');
require_once("../../assets/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$tglnow = date('d - m - Y');

$dari = $_GET['dari'];
$hingga = $_GET['hingga'];

$sql = mysqli_query($con, "SELECT * FROM kunjungan, penanganan WHERE kunjungan.kunjungan_id = penanganan.penanganan_kunjungan AND kunjungan.kunjungan_tanggal BETWEEN '$dari' AND '$hingga' ORDER BY kunjungan.kunjungan_id DESC");

$html = '<center><img src="../../assets/img/kop.jpg" width="1000px"></center><center><h3 style="font-family:sans-serif;">Laporan Kunjungan</h3></center><center><h5 style="font-family: Arial, Helvetica, sans-serif;">Dari : ' . $dari . ' - Hingga : ' . $hingga . '</h5></center><hr/><br/>';
$html .= '<table border="1" cellpadding="2" cellspacing="0" width="100%">
 <tr style="font-family:sans-serif; font-size:10px">
 <th>No.</th>
 <th>Nama Pasien</th>
 <th>Jenis Kelamin</th>
 <th>Umur</th>
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
 <td>" . $data['kunjungan_pasien_umur'] . "</td>
 <td>" . $data['kunjungan_poli'] . "</td>
 <td>" . $data['kunjungan_tanggal'] . " - " . $data['kunjungan_jam'] . "</td>
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
