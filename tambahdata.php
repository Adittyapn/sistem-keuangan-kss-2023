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
}
$sql = "INSERT INTO login (username, pass) VALUES 
('admin', 'admin')";
if (mysqli_query($conn, $sql)) {
    echo "data berhasil ditambah";
} else {
    echo "Gagal";
}
mysqli_close($conn);
