<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>✨ Sistem Informasi Keuangan ✨</title>
    <link rel="icon" href="src/image/NEW-LOGO-KSS.png" sizes="16x16 32x32" type="image/png" />
    <!-- 👇 css code file 👇 -->
    <link rel="stylesheet" href="./src/style/global.css" />
    <link rel="stylesheet" href="./src/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="./src/style/all.min.css" />
</head>

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
?>

<body class="bg-light">
    <!-- Main Start  -->
    <form method="post" action="insert.php">
        <div class="container">
            <div class="row mt-5 ma">
                <div class="col-12">
                    <img class="mx-auto d-block img-kss mb-3" src="src/image/NEW-LOGO-KSS.png" alt="" />
                </div>