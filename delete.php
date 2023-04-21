<?php
include "koneksi.php";
$id_penerimaan = $_GET["id_penerimaan"];
$query = "DELETE FROM penerimaan_kas WHERE id_penerimaan='$id_penerimaan'";
$sql = mysqli_query($conn, $query);
if ($sql) {
    header("location: laporan-penerimaan.php");
} else {
    echo "Error deleting data: " . mysqli_error($conn);
}
mysqli_close($conn);
