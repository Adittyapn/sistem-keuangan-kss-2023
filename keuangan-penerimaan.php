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
            <a class="nav-link" aria-current="page" href="tentang.php">Tentang Kami</a>
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
                    <input class="form-control" type="text" value="KSS-PNM-" name="no_invoice" id="no_invoice" aria-label="readonly input example" readonly autocomplete="off" />
                  </div>
                  <label for="" class="col-sm-2 text-end col-form-label"><b>Tanggal</b></label>
                  <div class="col-sm-4">
                    <div class="input-group">
                      <input type="text text-tanggal" id="datePicker" class="form-control datepicker border rounded-1" name="tanggal" autocomplete="off" required>
                      <span class="input-group-text" id="addon-wrapping"><i class="fa fa-calendar icon"></i></span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-6 border mb-3 py-3">
                <div class="row align-items-center">
                  <label for="from" class="col-sm-2 col-form-label"><b>Diterima Dari</b></label>
                  <!-- <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="001" name="kode_diterima" aria-label="readonly input example" id="kode_diterima" autocomplete="off" />
                  </div> -->
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="" name="nama_diterima" aria-label="readonly input example" id="nama_diterima" autocomplete="off" required />
                  </div>
                  <div class="col-sm-2">
                  </div>
                </div>
                <div class="row align-items-center">
                  <label for="Proyek" class="col-sm-2 col-form-label"><b>Proyek</b></label>
                  <!-- <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" name="kode_proyek" type="text" value="BL-001" aria-label="readonly input example" autocomplete="off" />
                  </div> -->
                  <div class="col-sm-4">
                    <select name="tambahProyek" id="tambahProyek" class="form-select">
                      <?php foreach ($proyek as $row) : ?>
                        <option value="<?= $row['id']; ?>"><?= $row["nama"]; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <button type="button" class="btn border btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                      <option value="tunai">Cash</option>
                      <option value="tunai">Giro</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kodeBank" class="col-sm-2 col-form-label">BANK</label>
                  <div class="col-sm-3">
                    <input id="kodeBank" name="kodeBank" type="text" value="BCA" class="form-control" required /> <!-- kalo disabled gak bisa di input valuenya -->
                  </div>
                  <!-- <div class="col-sm-7">
                    <input type="text" value="BRI" class="form-control" />
                  </div> -->
                </div>
                <div class="row mb-3">
                  <label for="noRek" class="col-sm-2 col-form-label">No Rekening</label>
                  <div class="col-sm-10">
                    <input id="noRekening" name="noRekening" type="text" value="" class="form-control" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="noGiro" class="col-sm-2 col-form-label">No Giro</label>
                  <div class="col-sm-8">
                    <input id="noGiro" name="noGiro" type="text" value="" class="form-control" autocomplete="off" />
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
                  <label for="nilaiPenerimaan" class="col-sm-2 col-form-label">Nilai Penerimaan</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input name="nilaiPnrm" id="nilaiPnrm" class="text-end form-control" onkeypress="return restrictAlpha(event)" autocomplete="off" required />
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="ppn" class="col-sm-2 col-form-label">PPN 10 %</label>
                  <div class="col-sm-2">
                    <input name="" id="" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="mt-2 d-flex justify-content-center col-sm-1">
                    <input class="form-check-input ppnCheck" type="checkbox" value="" id="ppnChecked" checked />
                  </div>
                  <div class="col-sm-7">
                    <input name="ppn" id="ppn" class="text-end form-control" autocomplete="off" />
                  </div>
                </div>
                <!-- <div class="row mb-3">
                  <label for="materai" class="col-sm-2 col-form-label">Materai</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input name="materai" id="materai" class="text-end form-control" onkeypress="return restrictAlpha(event)" autocomplete="off" />
                  </div>
                </div> -->
                <div class="pembatas">
                  <hr />
                </div>
                <div class="row mb-3">
                  <label for="kodeBank" class="col-sm-2 col-form-label">Total Penerimaan</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input id="total_pnrm" name="total_pnrm" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" autocomplete="off" />
                  </div>
                </div>
                <!-- <div class="row mb-3">
                   <label for="Potongan" class="col-sm-2 col-form-label">Potongan PPH</label> -->
                <!-- <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div> -->
                <!-- <div class="col-sm-2">
                    <input name="pot" id="pot" class="text-center form-control" value="5.0" onkeypress="return restrictAlpha(event)" readonly autocomplete="off" />
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
                  <label for="potlain" class="col-sm-2 col-form-label">Potongan Lain-Lain</label>
                  <div class="col-sm-2">
                    <input name="idr" id="idr" value="IDR" class="text-center form-control" disabled readonly />
                  </div>
                  <div class="col-sm-8">
                    <input id="pot_lain" name="pot_lain" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" autocomplete="off" required />
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
                    <input id="total_bayar" name="total_bayar" type="text" value="" class="text-end form-control" onkeypress="return restrictAlpha(event)" autocomplete="off" />
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
                  <div class="card-body" style="height: 300px; overflow: scroll; ">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">No. Invoice</th>
                          <th scope="col">Tanggal</th>
                          <th scope="col">Uraian</th>
                          <th scope="col">Nilai Penerimaan</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($penerimaan as $i => $row) : ?>
                          <tr>
                            <th scope="row"><?php echo ++$i ?></th>
                            <td><?php echo $row['no_invoice'] ?></td>
                            <td><?php echo $row['tanggal'] ?></td>
                            <td><?php echo $row['uraian'] ?></td>
                            <td><?php echo $row['nilai_penerimaan'] ?></td>
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
                  <h5 class="modal-title" id="staticBackdropLabel"> Tambah Proyek </h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <label for="" class="me-2">Tambah Proyek</label>
                  <input type="text" class="form-control-sm" name="text_proyek" autocomplete="off">
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
          document.getElementById("no_invoice").value = "KSS-PNM-" + selectedDate.split(/\s*\-\s*/g).join("");
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

    $("#nilaiPnrm").keyup(function() {
      var nilai_pnrm = parseFloat(document.getElementById("nilaiPnrm").value);
      console.log(nilai_pnrm);
      document.getElementById("ppn").value = nilai_pnrm * 10 / 100;
      updateTotalPnrm();
    });

    $(document).ready(function() {
      var nilai_pnrm = parseFloat(document.getElementById("nilaiPnrm").value);
      var ppn = parseFloat(document.getElementById("ppn").value);
      var checkboxChecked = $('#ppnChecked').prop('checked');

      if (checkboxChecked) {
        document.getElementById("total_pnrm").value = nilai_pnrm + ppn;
      } else {
        document.getElementById("total_pnrm").value = nilai_pnrm;
      }
    });

    $('#ppnChecked').change(function() {
      var nilai_pnrm = parseFloat(document.getElementById("nilaiPnrm").value);
      var ppn = parseFloat(document.getElementById("ppn").value);
      var checkboxChecked = $('#ppnChecked').prop('checked');

      if (checkboxChecked) {
        document.getElementById("total_pnrm").value = nilai_pnrm + ppn;
      } else {
        document.getElementById("total_pnrm").value = nilai_pnrm;
      }
    });
    $(document).ready(function() {
      $('#ppnChecked').change(function() {
        updateTotalPnrm();
      });

      $('#nilaiPnrm').keyup(function() {
        updateTotalPnrm();
      });

      $('#pot_lain').keyup(function() {
        updateTotalPnrm();
      });

      function updateTotalPnrm() {
        var nilai_pnrm = parseFloat(document.getElementById("nilaiPnrm").value);
        var ppn = parseFloat(document.getElementById("ppn").value);
        var checkboxChecked = $('#ppnChecked').prop('checked');

        if (isNaN(nilai_pnrm)) {
          nilai_pnrm = 0;
        }

        if (isNaN(ppn)) {
          ppn = 0;
        }

        var total_pnrm = 0;
        if (checkboxChecked) {
          total_pnrm = nilai_pnrm + ppn;
        } else {
          total_pnrm = nilai_pnrm;
        }

        document.getElementById("total_pnrm").value = total_pnrm;
        updateTotalBayar();
      }

      function updateTotalBayar() {
        var total_pnrm = parseFloat(document.getElementById("total_pnrm").value);
        var pot_lain = parseFloat(document.getElementById("pot_lain").value);

        if (isNaN(total_pnrm)) {
          total_pnrm = 0;
        }

        if (isNaN(pot_lain)) {
          pot_lain = 0;
        }

        var total_bayar = total_pnrm - pot_lain;

        document.getElementById("total_bayar").value = total_bayar;
      }

      // Pembaruan awal saat nilai_pnrm pertama kali diinput
      updateTotalPnrm();
    });
  </script>
</body>

</html>