<h1 class="h3 mb-3">Data Pasien Hari Ini</h1>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Pasien Hari Ini - Belum Diperiksa</h5>
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
                                <th>Poli</th>
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
                            if ($poliidparamedis == '1') {
                                $sql = mysqli_query($con, "SELECT * FROM kunjungan, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_tanggal = '$today' AND kunjungan.kunjungan_status = 'Belum Diperiksa' ORDER BY kunjungan.kunjungan_id DESC");
                            } else {
                                $sql = mysqli_query($con, "SELECT * FROM kunjungan, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_tanggal = '$today' AND kunjungan.kunjungan_status = 'Belum Diperiksa' AND kunjungan.kunjungan_poli_id = '$poliidparamedis' ORDER BY kunjungan.kunjungan_id DESC");
                            }
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
                                            <a href="?page=kunjungan-detail&id=<?= $data['kunjungan_id'] ?>" class="text-primary"><i class="fa fa-info-circle fa-md"></i></a>
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
                                <th>Poli</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Ket.</th>
                                <th>Paramedis</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($poliidparamedis == '1') {
                                $sql = mysqli_query($con, "SELECT * FROM kunjungan, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_status = 'Telah Diperiksa' ORDER BY kunjungan.kunjungan_id DESC");
                            } else {
                                $sql = mysqli_query($con, "SELECT * FROM kunjungan, poli WHERE kunjungan.kunjungan_poli_id = poli.poli_id AND kunjungan.kunjungan_status = 'Telah Diperiksa' AND kunjungan.kunjungan_poli_id = '$poliidparamedis' ORDER BY kunjungan.kunjungan_id DESC");
                            }
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
                                            <a href="?page=kunjungan-detail&id=<?= $data['kunjungan_id'] ?>" class="text-primary"><i class="fa fa-info-circle fa-md"></i></a>
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