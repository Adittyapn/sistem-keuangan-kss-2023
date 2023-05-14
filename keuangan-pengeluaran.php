<?php

require "function.php";

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

  // cek apakah data berhasil di tambahkan atau tidak
  if (tambahpengeluaran($_POST) > 0) {
    echo "<script> 
              alert('Data Berhasil di Tambahkan!');
              document.location.href = 'keuangan-pengeluaran.php';
          </script>";
  } else {
    echo "<script> 
              alert('Data Gagal di Tambahkan!');
          </script>";
  }
}

$proyek = query("select * from proyek");

if (isset($_POST["submit_tambahProyek"])) {

  if (empty($_POST["text_proyek"])) {
    echo "<script> 
              alert('Data Gagal di Tambahkan!');
          </script>";
  } else {
    // cek apakah data berhasil di tambahkan atau tidak
    if (tambahProyek($_POST) > 0) {
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
}

$pengeluaran = query("SELECT * FROM pengeluaran_kas LEFT JOIN proyek ON pengeluaran_kas.proyek = proyek.id");
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
      <a class="navbar-brand" href="halaman.php"><img src="src/image/NEW-LOGO-KSS.png" alt="KSS-LOGO" width="60" height="25" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="halaman.php">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Keuangan
            </a>
            <ul class="dropdown-menu">
              <li>
                <a class="dropdown-item " href="keuangan-penerimaan.php">Penerimaan Kas</a>
              </li>
              <li>
                <a class="dropdown-item active" href="keuangan-pengeluaran.php">Pengeluaran Kas</a>
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
            <a class="nav-link" aria-current="page" href="tentang.php">Tentang Kami</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->
  <!-- Main Start  -->
  <!-- header content start -->

  <section class="form-pengeluaran">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h4 class="text-center">Pengeluaran Kas</h4>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="row">
              <div class="col-6 border mb-3 py-3">
                <div class="row align-items-center">
                  <label for="caraBayar" class="col-sm-2 col-form-label"><b>Keluar Melalui</b></label>
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
                    <input class="form-control" type="text" value="KSS-PLR-" name="no_invoice" id="no_invoice" aria-label="readonly input example" readonly />
                  </div>
                  <label for="" class="col-sm-2 text-end col-form-label"><b>Tanggal</b></label>
                  <div class="col-sm-4">
                    <!-- <input type="date" class="datepicker border rounded-1" name="tanggal" id="datePicker" /> -->
                    <div class="input-group">
                      <input type="text text-tanggal" id="datePicker" class="form-control datepicker border rounded-1" name="tanggal" autocomplete="off" required>
                      <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar icon"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 border mb-3 py-3">
                <div class="row align-items-center">
                  <label for="from" class="col-sm-2 col-form-label"><b>Dibayarkan Kpd.</b></label>
                  <!-- <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="001" aria-label="readonly input example" name="kode_bayar" id="kode_bayar" />
                  </div> -->
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="" aria-label="readonly input example" name="nama_dibayar" id="nama_dibayar" required />
                  </div>
                  <div class="col-sm-2">
                  </div>
                </div>
                <div class="row align-items-center">
                  <label for="Proyek" class="col-sm-2 col-form-label"><b>Proyek</b></label>
                  <!-- <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" name="kode_proyek" type="text" value="BL-001" aria-label="readonly input example" />
                  </div> -->
                  <div class="col-sm-4">
                    <select name="tambahProyek" id="tambahProyek" class="form-select">
                      <?php foreach ($proyek as $row) : ?>
                        <option value="<?= $row['id']; ?>"><?= $row["nama"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                    <!-- <input class="form-control form-control-sm w-100" type="text" value="Blue Land" aria-label="readonly input example" readonly /> -->
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn border btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      . . .
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
                      <option value="tunai">Cash</option>
                      <option value="tunai">Giro</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kodeBank" class="col-sm-2 col-form-label"> BANK</label>
                  <div class="col-sm-3">
                    <input id="kodeBank" name="kodeBank" type="text" value="BCA" class="form-control" required /> <!-- kalo disabled gak bisa di input valuenya -->
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="noRek" class="col-sm-2 col-form-label">No Rekening</label>
                  <div class="col-sm-10">
                    <input id="noRekening" name="noRekening" type="text" value="" class="form-control" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="noGiro" class="col-sm-2 col-form-label">No Giro</label>
                  <div class="col-sm-8">
                    <input id="noGiro" name="noGiro" type="text" value="" class="form-control" />
                  </div>
                  <div class="mt-2 d-flex justify-content-center col-sm-1">
                    <input class="form-check-input" type="checkbox" id="giroChecked" checked />
                  </div>
                </div>
                <br><br><br>
                <h6>* Jika tidak ada isi dengan 0 </h6>
              </div>
              <div class="col-6 mt-2">
                <div class="row mb-3">
                  <label for="nilaiPenerimaan" class="col-sm-2 col-form-label">Nilai Pengeluaran</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input name="nilaiPengeluaran" id="nilaiPengeluaran" class="text-end form-control" onkeypress="return restrictAlpha(event)" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="ppn" class="col-sm-2 col-form-label">PPN 10 %</label>
                  <div class="col-sm-2">
                    <input name="" id="" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="mt-2 d-flex justify-content-center col-sm-1">
                    <input class="form-check-input" type="checkbox" value="" id="ppnChecked" checked />
                  </div>
                  <div class="col-sm-7">
                    <input name="ppn" id="ppn" class="text-end form-control" />
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="materai" class="col-sm-2 col-form-label">Materai</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input name="materai" id="materai" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                </div> -->
                <div class="pembatas">
                  <hr />
                </div>
                <div class="row mb-3">
                  <label for="kodeBank" class="col-sm-2 col-form-label">Total Pengeluaran</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input id="total_pengeluaran" name="total_pengeluaran" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" disabled />
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="Potongan" class="col-sm-2 col-form-label">Potongan PPH</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-2">
                    <input name="pot" id="pot" class="text-center form-control" value="5.0" onkeypress="return restrictAlpha(event)" readonly />
                  </div>
                  <div class="col-sm-4">
                    <input name="pot1" id="pot1" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
                  </div>
                  <div class="mt-2 d-flex col-sm-2">
                    <input class="form-check-input" type="checkbox" value="" id="potChacked" />
                    <label for="" class="ms-2">Pot. Y/N</label>
                  </div>
                </div> -->
                <div class="row mb-3">
                  <label for="potlain" class="col-sm-2 col-form-label"> Potongan Lain-Lain</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input id="pot_lain" name="pot_lain" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" />
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
                    <input id="total_bayar" name="total_bayar" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" disabled />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="uraian" class="col sm-2 col-form-label">Uraian</label>
                  <div class="col-sm-8">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1"></label>
                      <textarea class="form-control" id="uraian" name="uraian" rows="3" required></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="pembatas">
                <hr />
              </div>
              <!-- main content end -->
            </div>
            <div class="row mt-3">
              <div class="col-10 offset-1">
                <div class="card">
                  <div class="card-header">
                    Input Detail
                  </div>
                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">No. Invoice</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Uraian</th>
                          <th scope="col">Nilai Pengeluaran</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($pengeluaran as $i => $row) : ?>
                          <tr>
                            <th scope="row"><?php echo ++$i ?></th>
                            <td><?php echo $row['no_invoice'] ?></td>
                            <td><?php echo $row['tanggal'] ?></td>
                            <td><?php echo $row['uraian'] ?></td>
                            <td><?php echo $row['nilaiPengeluaran'] ?></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-body-secondary">
            <div class="row">
              <div class="col-9 offset-3">
                <div class="row">
                  <div class="col-sm-7 align-items-center">
                    <button class="btn btn-danger" type="submit" name="submit">
                      <span class="fa fa-floppy-disk me-1"></span>Simpan
                    </button>
                  </div>
                  <div class="col-sm-2 align-items-center">
                    <button class="btn btn-danger" type="reset">
                      <span class="fa fa-trash me-1"></span>Hapus
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <form action="" method="POST">
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Tambah Proyek</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label for="" class="me-2">Tambah Proyek</label>
                  <input type="text" class="form-control-sm" name="text_proyek">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" name="submit_tambahProyek" id="tambahProyek">Tambah</button>
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
    //invoice format start
    $(document).ready(function() {
      $('#datePicker').datepicker({
        dateFormat: "dd-mm-yy",
        defaultDate: "+1w",
        numberOfMonths: 1,
        onClose: function(selectedDate) {
          $(".to_date").datepicker("option", selectedDate);
          $(this).parent().next().children().focus();
          document.getElementById("no_invoice").value = "KSS-PLR-" + selectedDate.split(/\s*\-\s*/g).join("");
        }
      });
    });
    //invoice format end

    //no giro start
    var checkboxGiro = document.querySelector("#giroChecked");
    var inputGiro = document.querySelector("#noGiro");

    var toogleInput = function(e) {
      if (!e.target.checked) {
        inputGiro.value = "";
      }
      inputGiro.disabled = !e.target.checked;
    };

    toogleInput({
      target: checkboxGiro
    });
    checkboxGiro.addEventListener("change", toogleInput);
    //no giro end

    //potpph start
    // var checkbox = document.querySelector("#potChacked");
    // var input = document.querySelector("#pot");
    // var input1 = document.querySelector("#pot1");

    // var toogleInput = function(e) {
    //   input.disabled = !e.target.checked;
    //   input1.disabled = !e.target.checked;
    // };

    // toogleInput({
    //   target: checkbox
    // });
    // checkbox.addEventListener("change", toogleInput);
    //potpph end

    //ppn check start
    var checkboxPpn = document.querySelector("#ppnChecked");
    var inputPpn = document.querySelector("#ppn");

    var toggleInput = function(e) {
      if (!e.target.checked) {
        inputPpn.value = "";
      }
      inputPpn.disabled = !e.target.checked;
    };

    toggleInput({
      target: checkboxPpn
    });
    checkboxPpn.addEventListener("change", toggleInput);

    //ppn check end


    ///// BARUU
    $("#nilaiPengeluaran").keyup(function() {
      var nilaiPengeluaran = parseFloat(document.getElementById("nilaiPengeluaran").value);
      console.log(nilaiPengeluaran);
      document.getElementById("ppn").value = nilaiPengeluaran * 10 / 100;
      updateTotalPnrm();
    });

    $(document).ready(function() {
      var nilaiPengeluaran = parseFloat(document.getElementById("nilaiPengeluaran").value);
      var ppn = parseFloat(document.getElementById("ppn").value);
      var checkboxChecked = $('#ppnChecked').prop('checked');

      if (checkboxChecked) {
        document.getElementById("total_pengeluaran").value = nilaiPengeluaran + ppn;
      } else {
        document.getElementById("total_pengeluaran").value = nilaiPengeluaran;
      }
    });

    $('#ppnChecked').change(function() {
      var nilaiPengeluaran = parseFloat(document.getElementById("nilaiPengeluaran").value);
      var ppn = parseFloat(document.getElementById("ppn").value);
      var checkboxChecked = $('#ppnChecked').prop('checked');

      if (checkboxChecked) {
        document.getElementById("total_pengeluaran").value = nilaiPengeluaran + ppn;
      } else {
        document.getElementById("total_pengeluaran").value = nilaiPengeluaran;
      }
    });
    $(document).ready(function() {
      $('#ppnChecked').change(function() {
        updatetotal_pengeluaran();
      });

      $('#nilaiPengeluaran').keyup(function() {
        updatetotal_pengeluaran();
      });

      $('#pot_lain').keyup(function() {
        updatetotal_pengeluaran();
      });

      function updatetotal_pengeluaran() {
        var nilaiPengeluaran = parseFloat(document.getElementById("nilaiPengeluaran").value);
        var ppn = parseFloat(document.getElementById("ppn").value);
        var checkboxChecked = $('#ppnChecked').prop('checked');

        if (isNaN(nilaiPengeluaran)) {
          nilaiPengeluaran = 0;
        }

        if (isNaN(ppn)) {
          ppn = 0;
        }

        var total_pengeluaran = 0;
        if (checkboxChecked) {
          total_pengeluaran = nilaiPengeluaran + ppn;
        } else {
          total_pengeluaran = nilaiPengeluaran;
        }

        document.getElementById("total_pengeluaran").value = total_pengeluaran;
        updateTotalBayar();
      }

      function updateTotalBayar() {
        var total_pengeluaran = parseFloat(document.getElementById("total_pengeluaran").value);
        var pot_lain = parseFloat(document.getElementById("pot_lain").value);

        if (isNaN(total_pengeluaran)) {
          total_pengeluaran = 0;
        }

        if (isNaN(pot_lain)) {
          pot_lain = 0;
        }

        var total_bayar = total_pengeluaran - pot_lain;

        document.getElementById("total_bayar").value = total_bayar;
      }

      // Pembaruan awal saat nilaiPengeluaran pertama kali diinput
      updatetotal_pengeluaran();
    });
  </script>
</body>

</html>