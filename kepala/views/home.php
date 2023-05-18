<h1 class="h3 mb-3"><strong>Dashboard</strong></h1>

<div class="row">
    <div class="col-lg-8">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0">Kunjungan Bulanan - Tahun <?= date('Y') ?></h5>
            </div>
            <div class="card-body py-3">
                <div class="chart chart-sm">
                    <canvas id="chartjs-dashboard-line"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card flex-fill w-100">
            <div class="card-header">
                <h5 class="card-title mb-0">Kunjungan - Tahun <?= date('Y') ?></h5>
            </div>
            <div class="card-body d-flex">
                <div class="align-self-center w-100">
                    <div class="py-3">
                        <div class="chart chart-xs">
                            <canvas id="chartjs-dashboard-pie"></canvas>
                        </div>
                    </div>
                    <?php
                    $tahunini = date('Y');
                    $sqljklaki = mysqli_query($con, "SELECT * FROM kunjungan WHERE kunjungan_pasien_jk = 'Laki-laki' AND kunjungan_status = 'Telah Diperiksa' AND YEAR(kunjungan_tanggal) = '$tahunini'");
                    $numlaki = mysqli_num_rows($sqljklaki);

                    $sqljkperempuan = mysqli_query($con, "SELECT * FROM kunjungan WHERE kunjungan_pasien_jk = 'Perempuan' AND kunjungan_status = 'Telah Diperiksa' AND YEAR(kunjungan_tanggal) = '$tahunini'");
                    $numperempuan = mysqli_num_rows($sqljkperempuan);
                    ?>
                    <table class="table mb-0">
                        <tbody>
                            <tr>
                                <td>Laki-laki</td>
                                <td class="text-end"><?= $numlaki ?></td>
                            </tr>
                            <tr>
                                <td>Perempuan</td>
                                <td class="text-end"><?= $numperempuan ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- GRAFIK KUNJUNGAN BULANAN -->
<?php
$thisyear = date('Y');
$wilayah4 = mysqli_query($con, "SELECT MONTH(kunjungan_tanggal) as bulan FROM kunjungan WHERE kunjungan_status = 'Telah Diperiksa' AND YEAR(kunjungan_tanggal) = '$thisyear' GROUP BY MONTH(kunjungan_tanggal)");
while ($row4 = mysqli_fetch_array($wilayah4)) {
    //$nama_wilayah4[] = $row4['bulan'];

    if ($row4['bulan'] == '01') {
        $nama_wilayah4[] = 'Januari';
    } elseif ($row4['bulan'] == '02') {
        $nama_wilayah4[] = 'Februari';
    } elseif ($row4['bulan'] == '03') {
        $nama_wilayah4[] = 'Maret';
    } elseif ($row4['bulan'] == '04') {
        $nama_wilayah4[] = 'April';
    } elseif ($row4['bulan'] == '05') {
        $nama_wilayah4[] = 'Mei';
    } elseif ($row4['bulan'] == '06') {
        $nama_wilayah4[] = 'Juni';
    } elseif ($row4['bulan'] == '07') {
        $nama_wilayah4[] = 'Juli';
    } elseif ($row4['bulan'] == '08') {
        $nama_wilayah4[] = 'Agustus';
    } elseif ($row4['bulan'] == '09') {
        $nama_wilayah4[] = 'September';
    } elseif ($row4['bulan'] == '10') {
        $nama_wilayah4[] = 'Oktober';
    } elseif ($row4['bulan'] == '11') {
        $nama_wilayah4[] = 'November';
    } else {
        $nama_wilayah4[] = 'Desember';
    }

    $query4 = mysqli_query($con, "SELECT * FROM kunjungan WHERE MONTH(kunjungan_tanggal) ='" . $row4['bulan'] . "' AND kunjungan_status = 'Telah Diperiksa' AND YEAR(kunjungan_tanggal) = '$thisyear'");
    $jumlah4[] = mysqli_num_rows($query4);
}
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
        var gradient = ctx.createLinearGradient(0, 0, 0, 225);
        gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
        gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
        // Line chart
        new Chart(document.getElementById("chartjs-dashboard-line"), {
            type: "line",
            data: {
                labels: <?php echo json_encode($nama_wilayah4); ?>,
                datasets: [{
                    label: "Kunjungan",
                    fill: true,
                    backgroundColor: gradient,
                    borderColor: window.theme.primary,
                    data: <?php echo json_encode($jumlah4); ?>,
                }]
            },
            options: {
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                tooltips: {
                    intersect: false
                },
                hover: {
                    intersect: true
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        reverse: true,
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            stepSize: 1000
                        },
                        display: true,
                        borderDash: [3, 3],
                        gridLines: {
                            color: "rgba(0,0,0,0.0)"
                        }
                    }]
                }
            }
        });
    });
</script>


<script>
    <?php
    $thisyear = date('Y');
    $sqlgender = mysqli_query($con, "SELECT * FROM kunjungan WHERE kunjungan_status = 'Telah Diperiksa' AND YEAR(kunjungan_tanggal) = '$thisyear' GROUP BY kunjungan_pasien_jk");
    while ($gender = mysqli_fetch_array($sqlgender)) {
        $nama_gender[] = $gender['kunjungan_pasien_jk'];
        $sqljumlahgender = mysqli_query($con, "SELECT * FROM kunjungan WHERE kunjungan_pasien_jk ='" . $gender['kunjungan_pasien_jk'] . "' AND kunjungan_status = 'Telah Diperiksa' AND YEAR(kunjungan_tanggal) = '$thisyear'");
        $jumlahgender[] = mysqli_num_rows($sqljumlahgender);
    }
    ?>
    document.addEventListener("DOMContentLoaded", function() {
        // Pie chart
        new Chart(document.getElementById("chartjs-dashboard-pie"), {
            type: "pie",
            data: {
                labels: <?php echo json_encode($nama_gender); ?>,
                datasets: [{
                    data: <?php echo json_encode($jumlahgender); ?>,
                    backgroundColor: [
                        window.theme.primary,
                        window.theme.warning,
                        window.theme.danger
                    ],
                    borderWidth: 5
                }]
            },
            options: {
                responsive: !window.MSInputMethodContext,
                maintainAspectRatio: false,
                legend: {
                    display: false
                },
                cutoutPercentage: 75
            }
        });
    });
</script>