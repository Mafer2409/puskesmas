<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="admin/img/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />

    <title>Sign In | Puskesmas Lewolaga</title>

    <link href="admin/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Haii! Welcome back...</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <div class="text-center">
                                        <img src="admin/img/logo/puskesmas-logo.png" alt="Charles Hall" class="img-fluid rounded" width="132" height="132" />
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label class="form-label">Akses</label>
                                            <select class="form-control form-control-lg" name="akses" required>
                                                <option value="">-- Pilih Akses --</option>
                                                <option value="admin">Admin</option>
                                                <option value="paramedis">Paramedis</option>
                                                <option value="kepala">Kepala</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" required />
                                        </div>
                                        <div class="text-center mt-3">
                                            <input type="submit" class="btn btn-primary btn-block" name="login" value="Sign In!">
                                            <!-- <button type="submit" class="btn btn-lg btn-primary">Sign in</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    include 'System/config.php';
    if (isset($_POST['login'])) {
        $akses = $_POST['akses'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        if ($akses == 'admin') {
            $sql = mysqli_query($con, "SELECT * FROM admin WHERE admin_email = '$email' AND admin_password = '$password'");
            if (mysqli_num_rows($sql) > 0) {
                session_start();
                $data = mysqli_fetch_assoc($sql);
                $_SESSION['id_admin'] = $data['admin_id'];
                $_SESSION['nama_admin'] = $data['admin_nama'];
                echo "<script>alert('Login Admin Berhasil !');window.location='admin/main.php';</script>";
                // echo $_SESSION['id_admin'];
                // echo $_SESSION['nama_admin'];
            } else {
                echo "<script>alert('Login Gagal ! Masukan E-Mail dan Password yang valid !');window.location='index.php';</script>";
            }
        } elseif ($akses == 'paramedis') {
            $sql = mysqli_query($con, "SELECT * FROM paramedis WHERE paramedis_email = '$email' AND paramedis_password = '$password'");
            if (mysqli_num_rows($sql) > 0) {
                @session_start();
                $data = mysqli_fetch_assoc($sql);
                $_SESSION['id_paramedis'] = $data['paramedis_id'];
                $_SESSION['nama_paramedis'] = $data['paramedis_nama'];
                echo "<script>alert('Login Paramedis Berhasil !');window.location='paramedis/main.php';</script>";
            } else {
                echo "<script>alert('Login Gagal ! Masukan E-Mail dan Password yang valid !');window.location='index.php';</script>";
            }
        } else {
            $sql = mysqli_query($con, "SELECT * FROM kepala WHERE kepala_email = '$email' AND kepala_password = '$password'");
            if (mysqli_num_rows($sql) > 0) {
                @session_start();
                $data = mysqli_fetch_assoc($sql);
                $_SESSION['id_kepala'] = $data['kepala_id'];
                $_SESSION['nama_kepala'] = $data['kepala_nama'];
                echo "<script>alert('Login Kepala Berhasil !');window.location='kepala/main.php';</script>";
            } else {
                echo "<script>alert('Login Gagal ! Masukan E-Mail dan Password yang valid !');window.location='index.php';</script>";
            }
        }
    }
    ?>

    <script src="js/app.js"></script>

</body>

</html>