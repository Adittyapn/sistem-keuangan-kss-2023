<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>✨ Sistem Informasi Keuangan ✨ a</title>
    <link
      rel="icon"
      href="src/image/NEW-LOGO-KSS.png"
      sizes="16x16 32x32"
      type="image/png"
    />
    <!-- 👇 css code file 👇 -->
    <link rel="stylesheet" href="./src/style/global.css" />
    <link rel="stylesheet" href="./src/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="./src/style/all.min.css" />
  </head>

  <body>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand" href="halaman.php"
          ><img
            src="src/image/NEW-LOGO-KSS.png"
            alt="KSS-LOGO"
            width="60"
            height="25"
        /></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="halaman.php"
                >Home</a
              >
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Keuangan
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="keuangan-penerimaan.php"
                    >Penerimaan Kas</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="keuangan-pengeluaran.php"
                    >Pengeluaran Kas</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Laporan
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="laporan-penerimaan.php"
                    >Penerimaan Kas</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="laporan-pengeluaran.php"
                    >Pengeluaran Kas</a
                  >
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Tentang Kami</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
    <!-- Main Start  -->
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-12 mt-2">
          <img src="src/image/tentang.png" class="img-fluid" alt="...">
        </div>
        <div class="col-4 offset-4 mt-5 text-center">
          <h2>PT. Koprima Sandysejahtera</h2>
        </div>
        <div class="col-auto mt-2">
          <p class="p-5">PT. Koprima Sandysejahtera atau lebih dikenal dengan KSS Properti berdiri sejak tahun 1990, merupakan Perusahaan Investasi Dana Pensiun Telkom dan Koperasi Telkom yang bergerak dalam bidang Pengembangan Perumahan, Jasa Konstruksi, dan Perdagangan berdasarkan Akta Notaris  Wiratni Ahmadi, SH Nomor 170 tanggal 23 November 1990. KSS Properti beralamat di Jalan Palasari No. 28, Malabar, Kec. Lengkong, Kota Bandung, Jawa Barat.</p>
        </div>
      </div>
    </div>
    <!-- Main End -->
    <!-- 👇 javascript code file 👇 -->
    <script src="./src/js/index.js"></script>
    <script src="./src/bootstrap/bootstrap.bundle.min.js"></script>
  </body>
</html>
