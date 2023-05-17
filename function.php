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
    $noGiro = isset($data["noGiro"]) ? $data["noGiro"] : "";
    // $kode_diterima = $data["kode_diterima"];
    $nama_diterima = $data["nama_diterima"];
    // $kode_proyek = $data["kode_proyek"];
    $tambahProyek = $data["tambahProyek"];
    $nilai_pnrm = $data["nilaiPnrm"];
    $ppn = isset($data['ppn']) ? $data['ppn'] : 0;
    // $materai = $data['materai'];
    $total_pnrm = $data['total_pnrm'];
    $potPPH = isset($data['pot1']) ? $data['pot1'] : 0;
    $potLain = $data['pot_lain'];
    $total_bayar = $data['total_bayar'];
    $uraian = $data['uraian'];

    // $nama = htmlspecialchars($data["nama"]);

    $query = "INSERT INTO penerimaan_kas 
                VALUES
                (NULL, '$payment', '$invoice', '$tanggal', '$caraBayar', '$kodeBank', '$noRek', '$noGiro', '$nama_diterima ','$tambahProyek', $nilai_pnrm, $ppn,
                $total_pnrm, $potPPH, $potLain, $total_bayar, '$uraian')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//tambah proyek
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
//end tambah proyek

//pengeluaran kas
function tambahpengeluaran($data)
{
    global $conn;

    $payment = $data["payment"];
    $invoice = $data["no_invoice"];
    $tanggal = date('Y-m-d', strtotime($data["tanggal"]));
    $caraBayar = $data["caraBayar"];
    $kodeBank = $data["kodeBank"];
    $noRek = $data["noRekening"];
    $noGiro = isset($data["noGiro"]) ? ($data["noGiro"]) : " " ;
    $nama_dibayar = $data["nama_dibayar"];
    $tambahProyek = $data["tambahProyek"];
    $nilaiPengeluaran = $data["nilaiPengeluaran"];
    $ppn = isset($data['ppn']) ? $data['ppn'] : 0;
    $total_pengeluaran = $data['total_pengeluaran'];
    $potPPH = isset($data['pot1']) ? $data['pot1'] : 0;
    $potLain = $data['pot_lain'];
    $total_bayar = $data['total_bayar'];
    $uraian = $data['uraian'];

    // $nama = htmlspecialchars($data["nama"]);

    $query = "INSERT INTO pengeluaran_kas 
                VALUES
                (null, '$payment', '$invoice', '$tanggal', '$caraBayar', '$kodeBank', '$noRek', '$noGiro', '$nama_dibayar','$tambahProyek', $nilaiPengeluaran, $ppn, 
                $total_pengeluaran, $potPPH, $potLain, $total_bayar, '$uraian')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function editData($data)
{
    global $conn;

    $id_penerimaan = $data['id_penerimaan'];
    $tanggal = $data['tanggal'];
    $no_invoice = $data['no_invoice'];
    $nama_diterima = $data['nama_diterima'];
    $noRekening = $data['noRekening'];
    $total_bayar = $data['total_bayar'];
    $uraian = $data['uraian'];

    $query = "UPDATE penerimaan_kas SET
            tanggal = '$tanggal',
            no_invoice = '$no_invoice',
            nama_diterima = '$nama_diterima',
            noRekening = '$noRekening',
            total_bayar = '$total_bayar',
            uraian = '$uraian'
            WHERE id_penerimaan = '$id_penerimaan'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    return mysqli_affected_rows($conn);
}

function editDataPengeluaran($data)
{
    global $conn;

    $id_pengeluaran = $data['id_pengeluaran'];
    $tanggal = $data['tanggal'];
    $no_invoice = $data['no_invoice'];
    $nama_dibayar = $data['nama_dibayar'];
    $no_rekening = $data['no_rekening'];
    $total_bayar = $data['total_bayar'];
    $uraian = $data['uraian'];

    $query = "UPDATE pengeluaran_kas SET
                            tanggal = '$tanggal',
                            no_invoice = '$no_invoice',
                            nama_dibayar = '$nama_dibayar',
                            no_rekening = '$no_rekening',
                            total_bayar = '$total_bayar',
                            uraian = '$uraian'
                            WHERE id_pengeluaran = '$id_pengeluaran'";

    if (!mysqli_query($conn, $query)) {
        die('Error: ' . mysqli_error($conn));
    }
    return mysqli_affected_rows($conn);
}
//end pengeluaran kas
