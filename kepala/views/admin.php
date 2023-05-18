<h1 class="h3 mb-3">Data Admin</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Admin</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="row" style="margin-bottom: 40px;">
                        <div class="col-lg-6" style="float:left">
                            <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambahAdmin"><i class="fa fa-plus"></i> Tambah Data</a>
                        </div>
                        <!-- <div class="col-lg-6">
                            <a href="../report/report-admin/report-admin.php" class="btn btn-md btn-info" target="_blank" style="float:right"><i class="fa fa-print"></i> Cetak Data</a>
                        </div> -->
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Admin</th>
                                <th>E-Mail</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM admin");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['admin_nama']; ?></td>
                                    <td><?= $data['admin_email']; ?></td>
                                    <td>
                                        <a href="" class="text-info" data-toggle="modal" data-target="#ModalEditAdmin<?= $data['admin_id'] ?>"><i class="fa fa-edit fa-md"></i></a>
                                        <a href="?page=hapus-admin&id=<?= $data['admin_id'] ?>" onclick="return confirm('Yakin ingin menghapus data ini ?')" class="text-danger"><i class="fa fa-trash fa-md"></i></a>
                                    </td>
                                </tr>
                                <!-- MODAL EDIT -->
                                <div class="modal fade" id="ModalEditAdmin<?= $data['admin_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin - <?= $data['admin_nama'] ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="post">
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Nama Admin</label>
                                                        <input type="hidden" name="admin_id" value="<?= $data['admin_id'] ?>">
                                                        <input class="form-control form-control-lg" type="text" name="admin_nama" value="<?= $data['admin_nama'] ?>" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">E-Mail</label>
                                                        <input class="form-control form-control-lg" type="email" name="admin_email" value="<?= $data['admin_email'] ?>" required />
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Password <small><i>Abaikan jika tidak ingin mengganti password !</i></small></label>
                                                        <input class="form-control form-control-lg" type="password" name="admin_password" placeholder="Password..." />
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

<!-- MODAL TAMBAH -->
<div class="modal fade" id="ModalTambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Admin</label>
                        <input class="form-control form-control-lg" type="text" name="admin_nama" placeholder="Nama Lengkap..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-Mail</label>
                        <input class="form-control form-control-lg" type="email" name="admin_email" placeholder="E-Mail..." required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control form-control-lg" type="password" name="admin_password" placeholder="Password..." required />
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
    $admin_nama = $_POST['admin_nama'];
    $admin_email = $_POST['admin_email'];
    $admin_password = md5($_POST['admin_password']);

    $sql = mysqli_query($con, "INSERT INTO admin VALUES('', '$admin_nama', '$admin_email', '$admin_password')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambah !');window.location='?page=admin';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah !');window.location='?page=admin';</script>";
    }
}


if (@$_POST['save']) {
    $admin_id = $_POST['admin_id'];
    $admin_nama = $_POST['admin_nama'];
    $admin_email = $_POST['admin_email'];
    $password = $_POST['admin_password'];

    if ($password == '') {
        $sql = mysqli_query($con, "UPDATE admin SET admin_nama = '$admin_nama', admin_email = '$admin_email' WHERE admin_id = '$admin_id'");
        if ($sql) {
            echo "<script>alert('Data berhasil diubah !');window.location='?page=admin';</script>";
        } else {
            echo "<script>alert('Data gagal diubah !');window.location='?page=admin';</script>";
        }
    } else {
        $admin_password = md5($_POST['admin_password']);
        $sql = mysqli_query($con, "UPDATE admin SET admin_nama = '$admin_nama', admin_email = '$admin_email', admin_password = '$admin_password' WHERE admin_id = '$admin_id'");
        if ($sql) {
            echo "<script>alert('Data berhasil diubah !');window.location='?page=admin';</script>";
        } else {
            echo "<script>alert('Data gagal diubah !');window.location='?page=admin';</script>";
        }
    }
}

?>