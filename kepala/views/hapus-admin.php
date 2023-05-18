<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "DELETE FROM admin WHERE admin_id = '$id'");
if ($sql) {
    echo "<script>alert('Data berhasil dihapus !');window.location='?page=admin';</script>";
} else {
    echo "<script>alert('Data gagal dihapus !');window.location='?page=admin';</script>";
}
