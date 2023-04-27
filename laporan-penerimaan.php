<?php

require "function.php";

// cek apakah tombol submit sudah ditekan atau belum
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
            <div class="col-10 offset-2 mb-3 mt-3">
              <form action="">
                <div class="row align-items-center">
                  <label for="" class="col-sm-2 col-form-label"><b>Periode Transaksi</b></label>
                  <div class="col-sm-10 d-flex">
                    <div class="col-3 me-3">
                      <div class="input-group">
                        <input type="text" id="from" name="from" class="form-control form-control-sm" data-target="#reservationdate" autocomplete="off">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-auto">
                      <label for="" class=" col-form-label">to</label>
                    </div>
                    <div class="col-3 ms-3">
                      <div class="input-group">
                        <input type="text" id="to" name="to" class="form-control form-control-sm" data-target="#reservationdate2" autocomplete="off">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                    </div>
                    <div class="col-2 ms-4">
                      <button class="btn btn-danger btn-sm" type="reset">
                          <span class="fa fa-file me-1"></span>Baru
                      </button>
                      <button class="btn btn-danger btn-sm" id="cetak">
                          <span class=" fa fa-print me-1"></span>Cetak
                      </button>
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
                <table class="table table-bordered" id="myTable">
                  <thead>
                    <tr class="text-center">
                      <th scope="col" rowspan="2">No</th>
                      <th scope="col" colspan="2">Transaksi</th>

                      <th scope="col" rowspan="2">Proyek</th>
                      <th scope="col" rowspan="2"> Rekanan </th>
                      <th scope="col" rowspan="2">Sumber Dana</th>
                      <th scope="col" colspan="2">Mata Uang</th>
                      <th scope="col" colspan="2">Nominal</th>
                      <!-- <th scope="col" colspan="2">Ekuivalen</th> -->
                      <th scope="col" rowspan="2">Uraian</th>
                      <th scope="col" rowspan="2">Edit/Delete</th>
                    </tr>
                    <tr class="text-center">
                      <th> Tanggal </th>
                      <th> No Invoice </th>
                      <th> Kode </th>
                      <th> rate </th>
                      <th>Debet (Masuk)</th>
                      <th>Kredit(Keluar)</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($penerimaan as $row) : ?>
                      <td><?= $i ?></td>
                      <td><?= $row['tanggal'] ?></td>
                      <td><?= $row['no_invoice'] ?></td>
                      <td><?= $row['nama'] ?></td>
                      <td><?= $row['nama_diterima'] ?></td>
                      <td><?= $row['noRekening'] ?></td>
                      <td> IDR </td>
                      <td> 1.00 </td>
                      <td>0.00</td>
                      <td><?= $row['total_bayar'] ?></td>
                      <td><?= $row['uraian'] ?></td>
                      <td class="text-center">
                        <a type="button" id="tombolUbah" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#ubahModal" data-id_penerimaan="<?= $row['id_penerimaan'] ?>" data-tanggal="<?= $row['tanggal'] ?>" data-no_invoice="<?= $row['no_invoice'] ?>" data-nama="<?= $row['nama'] ?>" data-nama_diterima="<?= $row['nama_diterima'] ?>" data-no_rekening="<?= $row['noRekening'] ?>" data-total_bayar="<?= $row['total_bayar'] ?>" data-uraian="<?= $row['uraian'] ?>">
                          Edit
                        </a>
                        <a href="delete.php?id_penerimaan=<?= $row['id_penerimaan'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                          <button class="btn btn-outline-danger mx-1">Delete</button>
                        </a>
                      </td>
                      </tr>
                      <?php $i++; ?>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <iframe id="frame" src="print.php" style="width : 100px; border : 0; height : 0;" frameborder="0"></iframe>
        <!-- Modal -->
        <div class="modal fade" id="ubahModal" tabindex="-1" aria-labelledby="ubahModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ubahModalLabel">Edit Data</h5>
              </div>
              <form action="" method="POST">
                <div class="modal-body">
                  <div class="form-group mb-3">
                    <input type="hidden" class="form-control" id="id_penerimaan" name="id_penerimaan">
                  </div>
                  <!-- <div class="form-group mb-3">
                    <label for="payment" class="form-label">Payment</label>
                    <input type="text" class="form-control" id="payment" name="payment" autocomplete="off">
                  </div> -->
                  <div class="form-group mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="text" class="form-control" id="tanggal" name="tanggal" autocomplete="off">
                  </div>
                  <div class="form-group mb-3">
                    <label for="no_invoice" class="form-label">No. Invoice</label>
                    <input type="text" class="form-control" id="no_invoice" name="no_invoice" autocomplete="off">
                  </div>
                  <div class="form-group mb-3">
                    <label for="no_invoice" class="form-label">Proyek</label>
                    <input type="text" class="form-control" id="nama" name="nama" disabled>
                  </div>
                  <div class="form-group mb-3">
                    <label for="no_invoice" class="form-label">Rekanan</label>
                    <input type="text" class="form-control" id="nama_diterima" name="nama_diterima" autocomplete="off">
                  </div>
                  <div class="form-group mb-3">
                    <label for="no_invoice" class="form-label">Sumber Dana</label>
                    <input type="text" class="form-control" id="noRekening" name="noRekening" autocomplete="off">
                  </div>
                  <div class="form-group mb-3">
                    <label for="" class="form-label">Debet</label>
                    <input type="text" class="form-control" id="" name="" value="0.00" disabled>
                  </div>
                  <div class="form-group mb-3">
                    <label for="no_invoice" class="form-label">Kredit</label>
                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" autocomplete="off">
                  </div>
                  <div class="form-group mb-3">
                    <label for="no_invoice" class="form-label">Uraian</label>
                    <input type="text" class="form-control" id="uraian" name="uraian">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- main content end -->
      <!-- footer start -->
      <div class="card-footer text-body-secondary">
        <div class="row">
          <div class="col-7 offset-5">
            <div class="row">
              
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
  <script src="https://unpkg.com/jspdf-invoice-template@1.4.0/dist/index.js"></script>
  <script>
    //datepicker
    $(function() {
      var dateFormat = "dd/mm/yy",
        from = $("#from")
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat: "dd/mm/yy"
        })
        .on("change", function() {
          to.datepicker("option", "minDate", getDate(this));
          filterTable();
        }),
        to = $("#to").datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1,
          dateFormat: "dd/mm/yy"
        })
        .on("change", function() {
          from.datepicker("option", "maxDate", getDate(this));
          filterTable();
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

      function filterTable() {
        var from_date = $("#from").val();
        var to_date = $("#to").val();

        from_date = from_date.split("/").reverse().join("-");
        to_date = to_date?.split("/").reverse().join("-") || new Date().toISOString().split("T")[0];

        $("tbody tr").hide().filter(function() {
          var date = $(this).find("td:eq(1)").text();
          return date >= from_date && date <= to_date;
        }).show();


      }
    });
    //edit 
    $(document).on("click", "#tombolUbah", function() {
      let id_penerimaan = $(this).data('id_penerimaan');
      let tanggal = $(this).data('tanggal');
      let no_invoice = $(this).data('no_invoice');
      let nama = $(this).data('nama');
      let nama_diterima = $(this).data('nama_diterima');
      let no_rekening = $(this).data('no_rekening');
      let total_bayar = $(this).data('total_bayar');
      let uraian = $(this).data('uraian');

      $(".modal-body #id_penerimaan").val(id_penerimaan);
      $(".modal-body #tanggal").val(tanggal);
      $(".modal-body #no_invoice").val(no_invoice);
      $(".modal-body #nama").val(nama);
      $(".modal-body #nama_diterima").val(nama_diterima);
      $(".modal-body #noRekening").val(no_rekening);
      $(".modal-body #total_bayar").val(total_bayar);

      $(".modal-body #uraian").val(uraian);
    });

    //cetak
    function printTable() {
      window.print();
    }

    function printTable() {
      var divToPrint = document.getElementById('myTable');
      var newWin = window.open('', 'Print-Window');
      newWin.document.open();
      newWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
      newWin.document.close();
      setTimeout(function() {
        newWin.close();
      }, 10);
    }

    $(function() {
      $('#cetak').click(function() {
        let wspFrame = document.getElementById('frame').contentwindow;
        wspFrame.focus();
        wspFrame.print();
      })
    })
  </script>
</body>

</html>