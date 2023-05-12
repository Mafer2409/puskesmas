<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "SELECT * FROM kunjungan, penanganan, admin, paramedis WHERE penanganan.penanganan_kunjungan = kunjungan.kunjungan_id AND kunjungan.kunjungan_admin = admin.admin_id AND kunjungan.kunjungan_paramedis = paramedis.paramedis_id AND kunjungan.kunjungan_id = '$id'");
$data = mysqli_fetch_assoc($sql);
?>

<h1 class="h3 mb-3">Detail Kunjungan</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Detail Kunjungan : <strong><?= $data['kunjungan_pasien_nama'] ?></strong></h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive table-sm">
                                <tr>
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <td><?= $data['kunjungan_pasien_nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin Pasien</td>
                                    <td>:</td>
                                    <td><?= $data['kunjungan_pasien_jk'] ?></td>
                                </tr>
                                <tr>
                                    <td>Umur Pasien</td>
                                    <td>:</td>
                                    <td><?= $data['kunjungan_pasien_umur'] ?></td>
                                </tr>
                                <tr>
                                    <td>Waktu Kunjungan</td>
                                    <td>:</td>
                                    <td><?= $data['kunjungan_tanggal'] ?> - <?= $data['kunjungan_jam'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status Kunjungan</td>
                                    <td>:</td>
                                    <td><?= $data['kunjungan_status'] ?></td>
                                </tr>
                                <tr>
                                    <td>Admin</td>
                                    <td>:</td>
                                    <td><?= $data['kunjungan_admin'] ?></td>
                                </tr>
                                <tr>
                                    <td>Paramedis</td>
                                    <td>:</td>
                                    <td><?= $data['paramedis_nama'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="table-responsive">
                            <table class="table table-hover table-responsive table-sm">
                                <tr>
                                    <td>Keluhan</td>
                                    <td>:</td>
                                    <td><?= $data['penanganan_keluhan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kesimpulan</td>
                                    <td>:</td>
                                    <td><?= $data['penanganan_kesimpulan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pengobatan</td>
                                    <td>:</td>
                                    <td><?= $data['penanganan_pengobatan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Ket.</td>
                                    <td>:</td>
                                    <td><?= $data['penanganan_ket'] ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>