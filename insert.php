<?php
include_once 'koneksi.php';
if (isset($_POST['save'])) {
    $nik = $_POST['nik'];
    $user = $_POST['username'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $pass = $_POST['password'];
    $sql = "INSERT INTO login (nik,username,nama_pengguna,pass)
	 VALUES ('$nik','$user','$nama_pengguna','$pass')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
header("location:login.php");
