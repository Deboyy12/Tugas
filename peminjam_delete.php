<?php
require_once 'koneksi.php';
$id_peminjam = $_GET["id_peminjam"];

$delete = $con->prepare("DELETE FROM peminjaman WHERE id_peminjam = ?");
$delete->bindParam(1, $id_peminjam);
$delete->execute();

echo "<script>
        alert('Data telah Dihapus');
        window.location.href = 'peminjam.php';
    </script>";
