<?php

require "koneksi.php";

function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    $payment = $data["payment"];
    $invoice = $data["no_invoice"];
    $tanggal = date('Y-m-d', strtotime($data["tanggal"]));
    $caraBayar = $data["caraBayar"];
    $kodeBank = $data["kodeBank"];
    $noRek = $data["noRekening"];
    $kode_proyek = $data["kode_proyek"];
    $tambahProyek = $data["tambahProyek"];
    $nilai_pnrm = $data["nilaiPnrm"];
    $ppn = $data['ppn'];
    $materai = $data['materai'];
    $total_pnrm = $data['total_pnrm'];
    $potPPH = isset($data['pot1']) ? $data['pot1'] : 0;
    $potLain = $data['pot_lain'];
    $total_bayar = $data['total_bayar'];
    $uraian = $data['uraian'];




    // $nama = htmlspecialchars($data["nama"]);

    $query = "INSERT INTO penerimaan_kas 
                VALUES
                (NULL, '$payment', '$invoice', '$tanggal', '$caraBayar', '$kodeBank', '$noRek', '$tambahProyek', '$kode_proyek',$nilai_pnrm,'$ppn',$materai,
                $total_pnrm, $potPPH, $potLain, $total_bayar, '$uraian')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahProyek($data)
{
    global $conn;

    $proyek = $data["text_proyek"];

    $query = "INSERT INTO proyek
              VALUES (
                NULL, '$proyek'
              )";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
