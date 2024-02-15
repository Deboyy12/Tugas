<?php
require_once 'koneksi.php';
$id_buku = $_GET["id_buku"];

$delete = $con->prepare("DELETE FROM buku WHERE id_buku = ?");
$delete->bindParam(1, $id_buku);
$delete->execute();

echo "<script>
        alert('Data telah Dihapus');
        window.location.href = 'buku.php';
    </script>";
