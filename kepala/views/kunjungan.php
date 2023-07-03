<h1 class="h3 mb-3">Data Pasien Hari Ini</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Pasien Hari Ini - Belum Diperiksa</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div class="float-left" style="margin-bottom: 40px; float:left;">
                            <a href="" class="btn btn-md btn-success" data-toggle="modal" data-target="#ModalTambahKunjungan"><i class="fa fa-plus"></i> Tambah Data</a>
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
                            $sql = mysqli_query($con, "SELECT * FROM kunjungan, admin, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_admin = admin.admin_id AND kunjungan.kunjungan_tanggal = '$today' AND kunjungan.kunjungan_status = 'Belum Diperiksa' ORDER BY kunjungan.kunjungan_id DESC");
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


        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Pasien Hari Ini - Telah Diperiksa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="bootstrap-data-table" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal lahir</th>
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
                            $sql = mysqli_query($con, "SELECT * FROM kunjungan, admin WHERE kunjungan.kunjungan_admin = admin.admin_id AND kunjungan.kunjungan_tanggal = '$today' AND kunjungan.kunjungan_status = 'Telah Diperiksa' ORDER BY kunjungan.kunjungan_id DESC");
                            while ($data = mysqli_fetch_assoc($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?>.</td>
                                    <td><?= $data['kunjungan_pasien_nama']; ?></td>
                                    <td><?= $data['kunjungan_pasien_jk']; ?></td>
                                    <td><?= date('d-m-Y', strtotime($data['kunjungan_pasien_tgl_lahir']))  ?></td>
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