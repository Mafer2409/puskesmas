<?php
$id = $_GET['id'];
$sqlkunjungan = mysqli_query($con, "SELECT * FROM kunjungan WHERE kunjungan_id = '$id'");
$datakunjungan = mysqli_fetch_assoc($sqlkunjungan);
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Penanganan Pasien - <?= $datakunjungan['kunjungan_pasien_nama'] ?></h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Pasien</label>
                                <input class="form-control form-control-lg" type="text" name="kunjungan_pasien_nama" placeholder="Nama Lengkap..." required value="<?= $datakunjungan['kunjungan_pasien_nama'] ?>" readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <input class="form-control form-control-lg" type="text" name="kunjungan_pasien_jk" placeholder="Jenis Kelamin..." value="<?= $datakunjungan['kunjungan_pasien_jk'] ?>" required readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Umur Pasien</label>
                                <input class="form-control form-control-lg" type="number" name="kunjungan_pasien_umur" placeholder="Umur..." value="<?= $datakunjungan['kunjungan_pasien_umur'] ?>" required readonly />
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keluhan</label>
                                <textarea class="form-control form-control-lg" name="penanganan_keluhan" cols="30" rows="5" required></textarea>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Kesimpulan</label>
                                <textarea class="form-control form-control-lg" name="penanganan_kesimpulan" cols="30" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Pengobatan</label>
                                <textarea class="form-control form-control-lg" name="penanganan_pengobatan" cols="30" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Keterangan <i>(Optional)</i></label>
                                <textarea class="form-control form-control-lg" name="penanganan_ket" cols="30" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary btn-block" name="simpan" value="Simpan">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>