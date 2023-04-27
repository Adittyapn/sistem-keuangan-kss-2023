<?php
include "koneksi.php";
$id_pengeluaran = $_GET["id_pengeluaran"];
$query = "DELETE FROM pengeluaran_kas WHERE id_pengeluaran='$id_pengeluaran'";
$sql = mysqli_query($conn, $query);
if ($sql) {
    header("location: laporan-pengeluaran.php");
} else {
    echo "Error deleting data: " . mysqli_error($conn);
}
mysqli_close($conn);
