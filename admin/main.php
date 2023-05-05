<?php
session_start();
// include '../System/config.php';
// if (!isset($_SESSION['id_admin'])) {
//     echo "<script>alert('Anda harus login terlebih dahulu !');window.location='../index.php';</script>";
// } else {
//     $idadmin = $_SESSION['id_admin'];
//     $namaadmin = $_SESSION['nama_admin'];
// }
echo $_SESSION['id_admin'];
