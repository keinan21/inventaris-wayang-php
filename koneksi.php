<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_box_wayang";

$koneksi = new mysqli($host, $user, $pass, $db);

if($koneksi->connect_error){
    echo "DB tidak bisa tersambung" . $koneksi->connect_error;
    die();
}

echo "DB berhasil tersambung"

?>