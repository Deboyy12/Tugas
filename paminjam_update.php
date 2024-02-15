<?php
require_once 'koneksi.php';
$id_peminjam = $_POST['id_peminjam'];
$nama_peminjam = $_POST['nama_peminjam'];
$tanggal_peminjaman = $_POST['tanggal_peminjaman'];

$sql = "UPDATE peminjaman SET nama_peminjam = :nama_peminjam, tanggal_peminjaman = :tanggal_peminjaman WHERE id_peminjam = :id_peminjam";
$simpan = $con->prepare($sql);
$simpan->bindParam('nama_peminjam', $nama_peminjam);
$simpan->bindParam('tanggal_peminjaman', $tanggal_peminjaman);
$simpan->bindParam('id_peminjam', $id_peminjam);
$simpan->execute();

echo "<script>
        alert('Data Berhasil Diedit');
        window.location.href = 'peminjam.php';
    </script>";
