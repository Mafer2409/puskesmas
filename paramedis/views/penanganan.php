<?php
$id = $_GET['id'];
$sqlkunjungan = mysqli_query($con, "SELECT * FROM kunjungan, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_id = '$id'");
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
                                <label class="form-label">Poli</label>
                                <input class="form-control form-control-lg" type="text" name="kunjungan_poli_id" value="<?= $datakunjungan['poli_nama'] ?>" required readonly />
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

<?php
if (@$_POST['simpan']) {
    $penanganan_kunjungan = $id;
    $kunjungan_paramedis = $idparamedis;
    $penanganan_keluhan = $_POST['penanganan_keluhan'];
    $penanganan_kesimpulan = $_POST['penanganan_kesimpulan'];
    $penanganan_pengobatan = $_POST['penanganan_pengobatan'];
    $penanganan_ket = $_POST['penanganan_ket'];

    $sqlpenanganan = mysqli_query($con, "INSERT INTO penanganan VALUES('', '$penanganan_kunjungan', '$penanganan_keluhan', '$penanganan_kesimpulan', '$penanganan_pengobatan', '$penanganan_ket')");

    if ($sqlpenanganan) {
        $sql = mysqli_query($con, "UPDATE kunjungan SET kunjungan_status = 'Telah Diperiksa', kunjungan_paramedis = '$kunjungan_paramedis' WHERE kunjungan_id = '$penanganan_kunjungan'");

        if ($sql) {
            echo "<script>alert('Data berhasil ditambah !');window.location='?page=kunjungan';</script>";
        } else {
            echo "<script>alert('Data kunjungan gagal diubah !');window.location='?page=kunjungan';</script>";
        }
    } else {
        echo "<script>alert('Data penangana gagal ditambah !');window.location='?page=kunjungan';</script>";
    }
}
?>