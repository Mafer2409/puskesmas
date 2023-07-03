<h1 class="h3 mb-3">Semua Data Pasien</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Semua Data Pasien</h5>
            </div>
            <div class="card-body">
                <form action="?page=kunjungan-cari" method="post">
                    <div class="row mb-2">
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Dari :</label>
                                <input class="form-control form-control-sm" type="date" name="dari" required value="<?= date('Y-m-d') ?>" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Hingga :</label>
                                <input class="form-control form-control-sm" type="date" name="hingga" required value="<?= date('Y-m-d') ?>" />
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="mb-3">
                                <label class="form-label">Poli :</label>
                                <select name="poli" class="form-control form-control-sm">
                                    <option value="">Semua Poli</option>
                                    <?php
                                    $sqlpoli = mysqli_query($con, "SELECT * FROM poli");
                                    while ($datapoli = mysqli_fetch_assoc($sqlpoli)) {
                                    ?>
                                        <option value="<?= $datapoli['poli_id'] ?>"><?= $datapoli['poli_nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="text-center mt-4">
                                <input type="submit" class="btn btn-primary btn-block btn-md" name="cari" value="Cari">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="row">
                    <div class="row" style="margin-bottom: 40px;">
                        <!-- <div class="col-lg-6" style="float:left">
                            <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambahKunjungan"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div> -->
                        <!-- <div class="col-lg-6">
                            <a href="" class="btn btn-md btn-info" style="float:right"><i class="fa fa-print"></i> Cetak Data</a>
                        </div> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal lahir</th>
                                <th>Poli</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Ket.</th>
                                <th>Admin</th>
                                <th>Paramedis</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $today = date('Y-m-d');
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM kunjungan, admin, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_admin = admin.admin_id ORDER BY kunjungan.kunjungan_id DESC");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['kunjungan_pasien_nama']; ?></td>
                                    <td><?= $data['kunjungan_pasien_jk']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($data['kunjungan_pasien_tgl_lahir']))  ?></td>
                                    <td><?= $data['poli_nama']; ?></td>
                                    <td><?= $data['kunjungan_tanggal']; ?></td>
                                    <td><?= $data['kunjungan_jam']; ?></td>
                                    <td><?= $data['kunjungan_status']; ?></td>
                                    <td><?= $data['admin_nama']; ?></td>
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
                                    <td>
                                        <?php
                                        if ($data['kunjungan_status'] == 'Telah Diperiksa') {
                                        ?>
                                            <a href="?page=kunjungan-detail&id=<?= $data['kunjungan_id'] ?>" class="text-primary"><i class="fa fa-info-circle fa-md"></i></a>
                                        <?php
                                        } else {
                                        ?>
                                        <?php
                                        }
                                        ?>
                                        <!-- <a href="" onclick="return confirm('Yakin ingin menghapus data ini ???')" class="text-danger"><i class="fas fa-trash fa-md"></i></a> -->
                                    </td>
                                </tr>
                                <!-- MODAL EDIT -->
                                <div class="modal fade" id="ModalEditKunjungan<?= $data['kunjungan_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Kunjungan - <?= $data['kunjungan_pasien_nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <input type="hidden" name="id_edit_kunjungan" value="<?= $data['kunjungan_id'] ?>">
                                                        <label class="form-label">Nama Pasien</label>
                                                        <input class="form-control form-control-lg" type="text" name="kunjungan_pasien_nama" value="<?= $data['kunjungan_pasien_nama'] ?>" placeholder="Nama Lengkap..." required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        <select class="form-control form-control-lg" name="kunjungan_pasien_jk" required>
                                                            <?php
                                                            if ($data['kunjungan_pasien_jk'] == 'Laki-laki') {
                                                            ?>
                                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                                <option value="Laki-laki" selected>Laki-laki</option>
                                                                <option value="Perempuan">Perempuan</option>
                                                            <?php
                                                            } else {
                                                            ?>
                                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                                <option value="Laki-laki">Laki-laki</option>
                                                                <option value="Perempuan" selected>Perempuan</option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggal lahir Pasien</label>
                                                        <input class="form-control form-control-lg" type="date" name="kunjungan_pasien_tanggal_lahir" value="<?= $data['kunjungan_pasien_tanggal_lahir'] ?>" placeholder="Umur..." required />
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <input type="submit" class="btn btn-primary" name="save" value="Save">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- END MODAL EDIT -->
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