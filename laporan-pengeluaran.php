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
                <a class="dropdown-item" href="laporan-penerimaan.php">Penerimaan Kas</a>
              </li>
              <li>
                <a class="dropdown-item active" href="laporan-pengeluaran.php">Pengeluaran Kas</a>
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
          <h4 class="text-center">Laporan Pengeluaran Kas</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-6 border mb-3">
              <form action="">
                <div class="row align-items-center">
                  <label for="caraBayar" class="col-sm-2 col-form-label"><b>Periode Transaksi</b></label>
                  <div class="col-sm-10 d-flex">
                    <div class="date-range me-4">
                      <input type="date" class="datepicker border rounded-1" />
                    </div>
                    <div class="date-range">
                      <input type="date" class="datepicker border rounded-1" />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label for="invoice" class="col-sm-2 col-form-label">
                    <b>No Invoice</b>
                  </label>
                  <div class="col-sm-4">
                    <input class="form-control form-control-sm w-100" type="text" value="KSS-PLR-07042023" aria-label="readonly input example" readonly />
                  </div>
                </div>
              </form>
            </div>
            <div class="col-6 border mb-3">
              <form action="">
                <div class="row align-items-center">
                  <label for="caraBayar" class="col-sm-2 col-form-label"><b>Proyek</b></label>
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
              </form>
            </div>
          </div>
        </div>
        <!-- header content end -->

        <!-- main content start -->
        <div class="col-12 mt-1">
          <div class="container-fluid p-2">
            <div class="container-fluid border border-1">
              <div class="col-12">
                <table class="table table-bordered mt-4">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">No Invoice</th>
                      <th scope="col">Proyek</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>19/12/2023</td>
                      <td>KSS-PNM-07042023</td>
                      <td>Blue Land</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>19/12/2023</td>
                      <td>KSS-PNM-07042023</td>
                      <td>Green Land</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>19/12/2023</td>
                      <td>KSS-PNM-07042023</td>
                      <td>Red Land</td>
                    </tr>
                  </tbody>
                </table>
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
                  <button class="btn btn-danger">
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
</body>

</html>