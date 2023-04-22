<?php

require "koneksi.php";
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
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css" />
</head>

<body>
  <section>
    <div class="card">
      <div class="card-body">
        <div class="container mb-5 mt-3">
          <div class="container">
            <div class="col-md-12 mb-5">
              <div class="text-center">
                <h3 class="pt-0">Laporan Pengeluaran Kas</h3>
              </div>
            </div>


            <div class="row my-2 mx-1 justify-content-center">
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
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
              </table>
            </div>
            <hr />
            <div class="row">
              <div class="col-xl-10">
                <p>Thank you for your purchase</p>
              </div>
              <div class="col-xl-2">
                <button type="button" class="btn btn-primary text-capitalize" style="background-color: #60bdf3">
                  Pay Now
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="src/js/index.js"></script>
  <script src="src/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
</body>

</html>