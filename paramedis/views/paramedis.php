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
                                <th>E-Mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $sql = mysqli_query($con, "SELECT * FROM paramedis");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['paramedis_nama']; ?></td>
                                    <td><?= $data['paramedis_email']; ?></td>
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

    $sql = mysqli_query($con, "INSERT INTO paramedis VALUES('', '$paramedis_nama', '$paramedis_email', '$paramedis_password')");

    if ($sql) {
        echo "<script>alert('Data berhasil ditambah !');window.location='?page=paramedis';</script>";
    } else {
        echo "<script>alert('Data gagal ditambah !');window.location='?page=paramedis';</script>";
    }
}

?>