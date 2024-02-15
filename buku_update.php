<?php
require_once 'koneksi.php';
$id_buku = $_POST['id_buku'];
$judul_buku = $_POST['judul_buku'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$tahun_buku = $_POST['tahun_buku'];

$sql = "UPDATE buku SET judul_buku = :judul_buku, pengarang = :pengarang, penerbit = :penerbit, tahun_buku = :tahun_buku WHERE id_buku = :id_buku";
$simpan = $con->prepare($sql);
$simpan->bindParam('judul_buku', $judul_buku);
$simpan->bindParam('pengarang', $pengarang);
$simpan->bindParam('penerbit', $penerbit);
$simpan->bindParam('tahun_buku', $tahun_buku);
$simpan->bindParam('id_buku', $id_buku);
$simpan->execute();

echo "<script>
        alert('Data Berhasil Diedit');
        window.location.href = 'buku.php';
    </script>";
