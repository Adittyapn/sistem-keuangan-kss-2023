<?php
session_start();
include "koneksi.php";
if (
    $_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])
) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $sql = mysqli_query($conn, "SELECT * FROM login WHERE username='$user' AND pass='$pass'");

    $cek = mysqli_num_rows($sql);
    // cek apakah username dan password ditemukan pada database
    if ($cek > 0) {
        // buat session login dan username
        $_SESSION['username'] = $user;
        echo "<script> 
              location.href='index.php';
              alert('Login Berhasil!');
          </script>";
        // alihkan ke halaman dashboard admin

    } else {
        echo "<script> 
                  alert('Login Gagal');
              </script>";
    }
    if (!$sql) {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
}
?>




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

<body class="bg-light">
    <!-- Main Start  -->
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <img class="mx-auto d-block img-kss mb-3" src="src/image/NEW-LOGO-KSS.png" alt="" />
            </div>
            <div class="col-lg-5 bg-white rounded-2 m-auto wrapper">
                <h2 class="text-center pt-3 mb-5">
                    <i class="fa-solid fa-key px-1"></i>User Login
                </h2>
                <!-- Form start -->
                <form action="#" method="POST" autocomplete="off">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-user"></i></span>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Nama User" required oninvalid="this.setCustomValidity('Harap Isi Username')" oninput="this.setCustomValidity('')" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" placeholder="Password" required name="password" />
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Tahun Anggaran</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2019</option>
                            <option value="2023">2020</option>
                            <option value="2024">2021</option>
                        </select>
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-danger" name="login" value="login">Login</button>
                        <p class="text-center mt-3">
                            Belum memiliki akun ? <a href="register.php">Daftar disini</a>
                        </p>
                    </div>
                </form>
                <!-- Form end -->
            </div>
        </div>
    </div>
    <!-- Main End -->
    <!-- 👇 javascript code file 👇 -->
    <script src="./src/js/index.js">

    </script>
    <script src="./src/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>