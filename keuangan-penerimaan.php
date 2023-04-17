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

<body>
  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-3 sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="src/image/NEW-LOGO-KSS.png" alt="KSS-LOGO" width="60" height="25" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Keuangan
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item active" href="keuangan-penerimaan.php">Penerimaan Kas</a>
              </li>
              <li>
                <a class="dropdown-item" href="keuangan-pengeluaran.php">Pengeluaran Kas</a>
              </li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Laporan
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="laporan-penerimaan.php">Penerimaan Kas</a></li>
              <li><a class="dropdown-item" href="laporan-pengeluaran.php">Pengeluaran Kas</a></li>
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

  <section class="form-penerimaan">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Penerimaan Kas</h4>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-6 border mb-3 py-3">
                <div class="row align-items-center">
                  <label for="caraBayar" class="col-sm-2 col-form-label"><b>Diterima Melalui</b></label>
                  <div class="p-2 col-sm-10 d-flex">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment" id="payment" value="KAS" />
                      <label class="form-check-label me-1" for="flexRadioDefault1">
                        KAS
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment" id="payment" value="BANK" checked />
                      <label class="form-check-label me-1" for="flexRadioDefault2">
                        BANK
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="payment" id="payment" value="GIRO" />
                      <label class="form-check-label me-1" for="flexRadioDefault3">
                        GIRO
                      </label>
                    </div>
                  </div>
                </div>
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
              <div class="col-6 border mb-3 py-3">
                <div class="row align-items-center">
                  <label for="from" class="col-sm-2 col-form-label"><b>Diterima Dari</b></label>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="TBS006/001" aria-label="readonly input example" readonly />
                  </div>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="Achmad Sumartono" aria-label="readonly input example" readonly />
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn border btn-sm">
                      ...
                    </button>
                  </div>
                </div>
                <div class="row align-items-center">
                  <label for="Proyek" class="col-sm-2 col-form-label"><b>Proyek</b></label>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="MGL001" aria-label="readonly input example" readonly />
                  </div>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="Blue Land" aria-label="readonly input example" readonly />
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn border btn-sm">
                      ...
                    </button>
                  </div>
                </div>
              </div>
              <!-- header content end -->
              <!-- main content start -->

              <div class="col-6 mt-2">
                <div class="row mb-3">
                  <label for="caraBayar" class="col-sm-2 col-form-label">Cara Bayar</label>
                  <div class="col-sm-10">
                    <select name="caraBayar" id="caraBayar" class="form-select">
                      <option value="transfer" selected>Transfer</option>
                      <option value="tunai" selected>Tunai</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kodeBank" class="col-sm-2 col-form-label">Kode Bank</label>
                  <div class="col-sm-3">
                    <input id="kodeBank" name="kodeBank" type="text" value="BTN001" class="form-control" readonly /> <!-- kalo disabled gak bisa di input valuenya -->
                  </div>
                  <div class="col-sm-6">
                    <input type="text" value="BTN" class="form-control" disabled readonly />
                  </div>
                  <div class="col-sm-1">
                    <button type="button" class="mt-1 btn border btn-sm">
                      ...
                    </button>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="noRek" class="col-sm-2 col-form-label">No Rekening</label>
                  <div class="col-sm-10">
                    <input id="noRekening" name="noRekening" type="text" value="BTN-010072-01-30-888" class="form-control" />
                  </div>
                </div>
              </div>
              <div class="col-6 mt-2">
                <div class="row mb-3">
                  <label for="nilaiPenerimaan" class="col-sm-2 col-form-label">Nilai Penerimaan</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input name="nilaiPnrm" id="nilaiPnrm" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="ppn" class="col-sm-2 col-form-label">PPN 10 %</label>
                  <div class="col-sm-2">
                    <input name="ppn" id="ppn" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="mt-2 d-flex justify-content-center col-sm-1">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" />
                  </div>
                  <div class="col-sm-7">
                    <input name="nilaiPnrm" id="nilaiPnrm" class="text-end form-control" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="materai" class="col-sm-2 col-form-label">Materai</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input name="materai" id="materai" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                </div>
                <div class="pembatas">
                  <hr />
                </div>
                <div class="row mb-3">
                  <label for="kodeBank" class="col-sm-2 col-form-label">Total Penerimaan</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input id="noRek" name="noRek" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="Potongan" class="col-sm-2 col-form-label">Potongan PPH</label>
                  <div class="col-sm-2 mb-0">
                    <select name="Potongan" id="Potongan" class="form-select">
                      <option value="transfer" selected>1</option>
                      <option value="tunai" selected>2</option>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <input name="pot" id="pot" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-4">
                    <input name="" id="" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="potlain" class="col-sm-2 col-form-label">Potongan Lain-Lain</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input id="" name="" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                </div>
                <div class="pembatas">
                  <hr />
                </div>
                <div class="row mb-3">
                  <label for="kodeBank" class="col-sm-2 col-form-label">Total Dibayarkan
                  </label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input id="" name="" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="uraian" class="col sm-2 col-form-label">Uraian</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1"></label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- main content end -->
            </div>
          </div>
          <div class="card-footer text-body-secondary">
            <div class="row">
              <div class="col-10 offset-2">
                <div class="row">
                  <div class="col-sm-2 align-items-center">
                    <button class="btn btn-danger">
                      <span class="fa fa-file me-1"></span>Baru
                    </button>
                  </div>
                  <div class="col-sm-2 align-items-center">
                    <button class="btn btn-danger" type="submit" name="submit">
                      <span class="fa fa-floppy-disk me-1"></span>Simpan
                    </button>
                  </div>
                  <div class="col-sm-2 align-items-center">
                    <button class="btn btn-danger">
                      <span class="fa fa-xmark me-1"></span>Batal
                    </button>
                  </div>
                  <div class="col-sm-2 align-items-center">
                    <button class="btn btn-danger" type="reset">
                      <span class="fa fa-trash me-1"></span>Hapus
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
        </form>

      </div>
    </div>
  </section>

  <!-- Main End -->
  <!-- 👇 javascript code file 👇 -->
  <script src="src/js/index.js"></script>
  <script src="src/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
  <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
  <script>
    $(document).ready(function() {
      $('#datePicker').datepicker({
        dateFormat: "dd-mm-yy",
        defaultDate: "+1w",
        buttonImage: "https://w7.pngwing.com/pngs/162/843/png-transparent-computer-icons-calendar-date-others-miscellaneous-text-calendar.png",
        numberOfMonths: 1,
        onClose: function(selectedDate) {
          $(".to_date").datepicker("option", selectedDate);
          $(this).parent().next().children().focus();
          document.getElementById("no_invoice").value = "KSS-PNM-" + selectedDate.split(/\s*\-\s*/g).join("");
        }
      });
    });
  </script>
</body>

</html>