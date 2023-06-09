<?php

if (isset($_POST["edit"])) {

  // cek apakah data berhasil di tambahkan atau tidak
  if (editData($_POST) > 0) {
    echo "<script> 
              alert('Data Berhasil di Edit!');
          </script>";
  } else {
    echo "<script> 
              alert('Data Gagal di Edit!');
          </script>";
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
  <form method="post" action="insert.php">
    <div class="container">
      <div class="row mt-5 ma">
        <div class="col-12">
          <img class="mx-auto d-block img-kss mb-3" src="src/image/NEW-LOGO-KSS.png" alt="" />
        </div>
        <div class="col-lg-5 bg-white rounded-2 m-auto wrapper">
          <h2 class="text-center pt-3 mb-5">Register</h2>
          <!-- Form start -->
          <form action="#" autocomplete="off">
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="NIK" required name="nik" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Pengguna" required name="nama_pengguna" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Jabatan" required name="jabatan" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa fa-circle-user"></i></span>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Username" required name="username" />
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text"><i class="fa fa-lock"></i></span>
              <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password" required name="password" />
            </div>
            <div class="d-grid mb-3">
              <button type="submit" class="btn btn-danger" name="save" value="submit">Daftar</button>
              <p class="text-center mt-3">
                Sudah memiliki akun ? <a href="index.php">Login disini</a>
              </p>
            </div>
          </form>
  </form>
  <!-- Form end -->
  </div>
  </div>
  </div>
  <!-- Main End -->
  <!-- 👇 javascript code file 👇 -->
  <script src="./src/js/index.js"></script>
  <script src="./src/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>