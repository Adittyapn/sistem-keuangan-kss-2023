<?php

require "function.php";

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil di tambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "<script> 
              alert('Data Berhasil di Tambahkan!');
              document.location.href = 'keuangan-penerimaan.php';
          </script>";
  } else {
    echo "<script> 
              alert('Data Gagal di Tambahkan!');
          </script>";
  }
}

$penerimaan = query("SELECT * FROM penerimaan_kas LEFT JOIN proyek ON penerimaan_kas.proyek = proyek.id");
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
  <link rel="Stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" type="text/css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
</head>

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><img src="src/image/NEW-LOGO-KSS.png" alt="KSS-LOGO" width="60" height="25" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Keuangan
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item" href="keuangan-penerimaan.php">Penerimaan Kas</a>
              </li>
              <li>
                <a class="dropdown-item" href="keuangan-pengeluaran.php">Pengeluaran Kas</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Laporan
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item active" href="laporan-penerimaan.php">Penerimaan Kas</a>
              </li>
              <li>
                <a class="dropdown-item" href="laporan-pengeluaran.php">Pengeluaran Kas</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Tentang Kami</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
  <!-- Main Start  -->
  <!-- header content start -->

  <section class="form-laporan-penerimaan">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Laporan Penerimaan Kas</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-9 offset-3 mb-3 mt-3">
              <form action="">
                <div class="row align-items-center">
                  <label for="" class="col-sm-2 col-form-label"><b>Periode Transaksi</b></label>
                  <div class="col-sm-10 d-flex">
                    <div class="col-3 me-3">
                      <div class="input-group">
                        <input type="text" id="from" name="from" class="form-control form-control-sm">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <label for="" class=" col-form-label">to</label>
                    </div>
                    <div class="col-3 ms-3">
                      <div class="input-group">
                        <input type="text" id="to" name="to" class="form-control form-control-sm">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- header content end -->

        <!-- main content start -->
        <div class="col-12 mt-1">
          <div class="container-fluid p-2">
            <div class="container-fluid border border-1">
              <div class="col-12 mt-3">
                <table class="table table-bordered">
                  <thead>
                    <tr class="text-center">
                      <th scope="col">No</th>
                      <th scope="col">Diterima Melalui</th>
                      <th scope="col">No Invoice</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Cara Bayar</th>
                      <th scope="col">No Rekening</th>
                      <th scope="col">No Giro</th>
                      <th scope="col">Proyek</th>
                      <th scope="col">Uraian</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($penerimaan as $i => $row) : ?>
                      <tr>
                        <th scope="row"><?php echo ++$i ?></th>
                        <td><?php echo $row['payment'] ?></td>
                        <td><?php echo $row['no_invoice'] ?></td>
                        <td><?php echo $row['tanggal'] ?></td>
                        <td><?php echo $row['caraBayar'] ?></td>
                        <td><?php echo $row['noRekening'] ?></td>
                        <td><?php echo $row['noGiro'] ?></td>
                        <td><?php echo $row['nama'] ?></td>
                        <td><?php echo $row['uraian'] ?></td>
                        <td class="text-center">
                          <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Edit
                          </button>
                          <button class="btn btn-outline-danger mx-1">Delete</button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="container">
                  <div class="row">
                    <label for="no_invoice" class="col-sm-2 col-form-label">
                      <b>No Invoice</b>
                    </label>
                    <div class="col-sm-4">
                      <input class="form-control" type="text" value="KSS-PNM-" name="no_invoice" id="no_invoice" aria-label="readonly input example" readonly />
                    </div>
                    <label for="" class="col-sm-2 text-end col-form-label"><b>Tanggal</b></label>
                    <div class="col-sm-4">
                      <!-- <input type="date" class="datepicker border rounded-1" name="tanggal" id="datePicker" /> -->
                      <div class="input-group">
                        <input type="text text-tanggal" id="datePicker" class="form-control datepicker border rounded-1" name="tanggal" autocomplete="off">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar icon"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
        <!-- main content end -->
        <!-- footer start -->
        <div class="card-footer text-body-secondary">
          <div class="row">
            <div class="col-8 offset-4">
              <div class="row">
                <div class="col-sm-2 align-items-center">
                  <button class="btn btn-danger" type="reset">
                    <span class="fa fa-file me-1"></span>Baru
                  </button>
                </div>
                <div class="col-sm-2 align-items-center">
                  <button class="btn btn-danger">
                    <span class="fa fa-eye me-1"></span>Tampil
                  </button>
                </div>
                <div class="col-sm-2 align-items-center">
                  <button class="btn btn-danger">
                    <span class="fa fa-print me-1"></span>Cetak
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- footer end -->
      </div>
    </div>
  </section>

  <!-- Main End -->
  <!-- 👇 javascript code file 👇 -->
  <script src="src/js/index.js"></script>
  <script src="src/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $(function() {
      var dateFormat = "mm/dd/yy",
        from = $("#from")
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on("change", function() {
          to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to").datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 3
        })
        .on("change", function() {
          from.datepicker("option", "maxDate", getDate(this));
        });

      function getDate(element) {
        var date;
        try {
          date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
          date = null;
        }

        return date;
      }
    });
  </script>
</body>

</html>