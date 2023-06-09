<h1 class="h3 mb-3">Data Paramedis</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Paramedis</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="row" style="margin-bottom: 40px;">
                        <div class="col-lg-6" style="float:left">
                            <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambahParamedis"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>
                        <!-- <div class="col-lg-6">
                            <a href="../report/report-admin/report-paramedis.php" class="btn btn-md btn-info" target="_blank" style="float:right"><i class="fa fa-print"></i> Cetak Data</a>
                        </div> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Paramedis</th>
                                <th>Poli</th>
                                <th>E-Mail</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM paramedis, poli WHERE paramedis.paramedis_poli_id = poli.poli_id");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['paramedis_nama']; ?></td>
                                    <td><?= $data['poli_nama']; ?></td>
                                    <td><?= $data['paramedis_email']; ?></td>
                                    <td>
                                        <a href="" class="text-info" data-toggle="modal" data-target="#ModalEditParamedis<?= $data['paramedis_id'] ?>"><i class="fa fa-edit fa-md"></i></a>
                                        <a href="?page=hapus-paramedis&id=<?= $data['paramedis_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ?')" class="text-danger"><i class="fa fa-trash fa-md"></i></a>
                                    </td>
                                </tr>
                                <!-- MODAL TAMBAH -->
                                <div class="modal fade" id="ModalEditParamedis<?= $data['paramedis_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Paramedis - <?= $data['paramedis_nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Paramedis</label>
                                                        <input type="hidden" name="paramedis_id" value="<?= $data['paramedis_id'] ?>">
                                                        <input class="form-control form-control-lg" type="text" name="paramedis_nama" value="<?= $data['paramedis_nama'] ?>" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Poli</label>
                                                        <select name="paramedis_poli_id" class="form-control form-control-lg" required>
                                                            <?php
                                                            $sqlpoli = mysqli_query($con, "SELECT * FROM poli ORDER BY poli_nama ASC");
                                                            while ($datapoli = mysqli_fetch_assoc($sqlpoli)) {
                                                                $sel = '';
                                                                if ($datapoli['poli_id'] == $data['paramedis_poli_id']) {
                                                                    $sel = 'selected';
                                                                } else {
                                                                    $sel = '';
                                                                }
                                                            ?>
                                                                <option value="<?= $datapoli['poli_id'] ?>" <?= $sel ?>><?= $datapoli['poli_nama'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">E-Mail</label>
                                                        <input class="form-control form-control-lg" type="email" name="paramedis_email" value="<?= $data['paramedis_email'] ?>" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Password <small><i>Abaikan jika tidak ingin mengganti password !</i></small></label>
                                                        <input class="form-control form-control-lg" type="password" name="paramedis_password" placeholder="Password..." />
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
                                <!-- END MODAL TAMBAH -->
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
<div class="modal fade" id="ModalTambahParamedis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Paramedis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Paramedis</label>
                        <input class="form-control form-control-lg" type="text" name="paramedis_nama" placeholder="Nama Lengkap..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Poli</label>
                        <select name="paramedis_poli_id" class="form-control form-control-lg" required>
                            <option value="">- Pilih Poli -</option>
                            <?php
                            $sqlpoli = mysqli_query($con, "SELECT * FROM poli ORDER BY poli_nama ASC");
                            while ($datapoli = mysqli_fetch_assoc($sqlpoli)) {
                            ?>
                                <option value="<?= $datapoli['poli_id'] ?>"><?= $datapoli['poli_nama'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <input class="form-control form-control-lg" type="email" name="paramedis_email" placeholder="E-Mail..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control form-control-lg" type="password" name="paramedis_password" placeholder="Password..." required />
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
    $paramedis_nama = $_POST['paramedis_nama'];
    $paramedis_email = $_POST['paramedis_email'];
    $paramedis_password = md5($_POST['paramedis_password']);
    $paramedis_poli_id = $_POST['paramedis_poli_id'];

    $sql = mysqli_query($con, "INSERT INTO paramedis VALUES('', '$paramedis_nama', '$paramedis_email', '$paramedis_password', '$paramedis_poli_id')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambah !');window.location='?page=paramedis';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah !');window.location='?page=paramedis';</script>";
    }
}


if (@$_POST['save']) {
    $paramedis_id = $_POST['paramedis_id'];
    $paramedis_nama = $_POST['paramedis_nama'];
    $paramedis_email = $_POST['paramedis_email'];
    $password = $_POST['paramedis_password'];
    $paramedis_poli_id = $_POST['paramedis_poli_id'];

    if ($password == '') {
        $sql = mysqli_query($con, "UPDATE paramedis SET paramedis_nama = '$paramedis_nama', paramedis_email = '$paramedis_email', paramedis_poli_id='$paramedis_poli_id' WHERE paramedis_id = '$paramedis_id'");
        if ($sql) {
            echo "<script>alert('Data berhasil diubah !');window.location='?page=paramedis';</script>";
        } else {
            echo "<script>alert('Data gagal diubah !');window.location='?page=paramedis';</script>";
        }
    } else {
        $paramedis_password = md5($_POST['paramedis_password']);
        $sql = mysqli_query($con, "UPDATE paramedis SET paramedis_nama = '$paramedis_nama', paramedis_email = '$paramedis_email', paramedis_poli_id='$paramedis_poli_id', paramedis_password = '$paramedis_password' WHERE paramedis_id = '$paramedis_id'");
        if ($sql) {
            echo "<script>alert('Data berhasil diubah !');window.location='?page=paramedis';</script>";
        } else {
            echo "<script>alert('Data gagal diubah !');window.location='?page=paramedis';</script>";
        }
    }
}

?>