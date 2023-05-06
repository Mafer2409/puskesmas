<?php
include 'System/config.php';
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
