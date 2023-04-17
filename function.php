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

    // $nama = htmlspecialchars($data["nama"]);

    $query = "INSERT INTO penerimaan_kas 
                VALUES
                (NULL, '$payment', '$invoice', '$tanggal', '$caraBayar', '$kodeBank', '$noRek')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
