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
    // $nama = htmlspecialchars($data["nama"]);
    // $email = htmlspecialchars($data["email"]);
    // $jurusan = htmlspecialchars($data["jurusan"]);

    // $query = "INSERT INTO mahasiswa
    //             VALUES
    //             ('', '$nrp', '$nama', '$email', '$jurusan', '$gambar')
    //             ";

    $query = "INSERT INTO penerimaan_kas VALUES(NULL, '$payment', '$invoice', '$tanggal')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
