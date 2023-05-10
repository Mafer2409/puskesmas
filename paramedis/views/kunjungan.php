<h1 class="h3 mb-3">Data Kunjungan Hari Ini</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Kunjungan Hari Ini - Telah Diperiksa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Umur</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Ket.</th>
                                <th>Paramedis</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $today = date('Y-m-d');
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM kunjungan WHERE kunjungan.kunjungan_tanggal = '$today' AND kunjungan.kunjungan_status = 'Belum Diperiksa' ORDER BY kunjungan.kunjungan_id DESC");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['kunjungan_pasien_nama']; ?></td>
                                    <td><?= $data['kunjungan_pasien_jk']; ?></td>
                                    <td><?= $data['kunjungan_pasien_umur']; ?></td>
                                    <td><?= $data['kunjungan_tanggal']; ?></td>
                                    <td><?= $data['kunjungan_jam']; ?></td>
                                    <td><?= $data['kunjungan_status']; ?></td>
                                    <td>
                                        <?php
                                        $idparam = $data['kunjungan_paramedis'];
                                        if ($idparam == 0) {
                                            echo "-";
                                        } else {
                                            $sqlparam = mysqli_query($con, "SELECT * FROM paramedis WHERE paramedis_id = '$idparam' LIMIT 1");
                                            $dataparam = mysqli_fetch_assoc($sqlparam);
                                            echo $dataparam['paramedis_nama'];
                                        }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <?php
                                        if ($data['kunjungan_status'] == 'Telah Diperiksa') {
                                        ?>
                                            <a href="?page=kunjungan-detail&id=<?= $data['kunjungan_id'] ?>" class="text-primary"><i class="fas fa-info-circle fa-md"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                            <a href="?page=penanganan&id=<?= $data['kunjungan_id'] ?>" class="text-danger" data-toggle="tooltip" data-placement="top" title="Periksa pasien"><i class="fa fa-plus fa-md"></i></a>
                                        <?php
                                        }
                                        ?>
                                        <!-- <a href="" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="text-danger"><i class="fas fa-trash fa-md"></i></a> -->
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="ModalTambahKunjungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kunjungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Pasien</label>
                        <input class="form-control form-control-lg" type="text" name="kunjungan_pasien_nama" placeholder="Nama Lengkap..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select class="form-control form-control-lg" name="kunjungan_pasien_jk" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Umur Pasien</label>
                        <input class="form-control form-control-lg" type="number" name="kunjungan_pasien_umur" placeholder="Umur..." value="18" required />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="simpan" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END MODAL TAMBAH -->

<?php
if (@$_POST['simpan']) {
    $kunjungan_pasien_nama = $_POST['kunjungan_pasien_nama'];
    $kunjungan_pasien_jk = $_POST['kunjungan_pasien_jk'];
    $kunjungan_pasien_umur = $_POST['kunjungan_pasien_umur'];
    $kunjungan_tanggal = date('Y-m-d');
    $kunjungan_jam = date('h:i:s a');
    $kunjungan_status = 'Belum Diperiksa';
    $kunjungan_admin = $idadmin;
    $kunjungan_paramedis = '0';

    $sql = mysqli_query($con, "INSERT INTO kunjungan VALUES('', '$kunjungan_pasien_nama', '$kunjungan_pasien_jk', '$kunjungan_pasien_umur', '$kunjungan_tanggal', '$kunjungan_jam', '$kunjungan_status', '$kunjungan_admin', '$kunjungan_paramedis')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambah !');window.location='?page=kunjungan';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah !');window.location='?page=kunjungan';</script>";
    }
}
?>