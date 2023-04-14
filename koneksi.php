<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "keuangan";
//buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);
//cek koneksi
if (!$conn) {
    echo "Connection gagal";
} else {
    echo "Koneksi berhasil";
}
