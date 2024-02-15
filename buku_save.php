<?php
require_once 'koneksi.php';

$id_buku = htmlspecialchars($_POST['id_buku']);
$judul_buku = htmlspecialchars($_POST['judul_buku']);
$pengarang = htmlspecialchars($_POST['pengarang']);
$penerbit = htmlspecialchars($_POST['penerbit']);
$tahun_buku = htmlspecialchars($_POST['tahun_buku']);


if (empty($id_buku) || empty($judul_buku) || empty($pengarang) || empty($penerbit) || empty($tahun_buku)) {
    echo "<script>
        alert('Data tidak boleh kosong!');
        window.location.href = 'buku.php';
    </script>";
} else {
    $cek = $con->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $cek->bindParam(1, $id_buku);
    $cek->execute();
    $jml = $cek->rowCount();

    if ($jml == 0) {

        $sql = "INSERT INTO buku (id_buku, judul_buku, pengarang, penerbit, tahun_buku) 
                VALUES (:id_buku, :judul_buku, :pengarang, :penerbit, :tahun_buku)";
        $simpan = $con->prepare($sql);
        $simpan->bindParam('id_buku', $id_buku);
        $simpan->bindParam('judul_buku', $judul_buku);
        $simpan->bindParam('pengarang', $pengarang);
        $simpan->bindParam('penerbit', $penerbit);
        $simpan->bindParam('tahun_buku', $tahun_buku);
        $simpan->execute();

        echo "<script>
                alert('Data Berhasil Disimpan');
                window.location.href = 'buku.php';
            </script>";
    } else {
        echo "<script>
                alert('Buku sudah Dipinjam!');
                window.location.href = 'buku.php';
            </script>";
    }
}



