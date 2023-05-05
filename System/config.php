<?php
date_default_timezone_set('Asia/Jakarta');

$con = mysqli_connect('localhost', 'root', '', 'puskesmas');
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}
