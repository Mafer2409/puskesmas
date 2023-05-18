<?php
$id = $_GET['id'];
$sql = mysqli_query($con, "DELETE FROM paramedis WHERE paramedis_id = '$id'");
if ($sql) {
    echo "<script>alert('Data berhasil dihapus !');window.location='?page=paramedis';</script>";
} else {
    echo "<script>alert('Data gagal dihapus !');window.location='?page=paramedis';</script>";
}
