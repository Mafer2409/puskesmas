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
                <div class="table-responsive">
                    <table class="table table-hover table-responsive">
                        <tr>
                            <td>Nama Pasien</td>
                            <td>:</td>
                            <td><?= $data['kunjungan_pasien_nama'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>