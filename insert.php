<?php
include_once 'koneksi.php';
if (isset($_POST['save'])) {
    $nik = $_POST['nik'];
    $user = $_POST['username'];
    $jabatan = $_POST['jabatan'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $pass = $_POST['password'];
    $sql = "INSERT INTO login (nik,username,jabatan,nama_pengguna,pass)
	 VALUES ('$nik','$user','$jabatan','$nama_pengguna','$pass')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
header("location:index.php");
