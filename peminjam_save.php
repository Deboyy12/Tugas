<?php
require_once 'koneksi.php';

$id_peminjam = htmlspecialchars($_POST['id_peminjam']);
$id_buku = htmlspecialchars($_POST['id_buku']);
$nama_peminjam = htmlspecialchars($_POST['nama_peminjam']);
$tanggal_peminjaman = htmlspecialchars($_POST['tanggal_peminjaman']);

if (empty($id_peminjam) || empty($id_buku) || empty($nama_peminjam) || empty($tanggal_peminjaman)) {
    echo "<script>
        alert('Data tidak boleh kosong!');
        window.location.href = 'peminjam.php';
    </script>";
} else {
    $cek = $con->prepare("SELECT * FROM peminjaman WHERE id_peminjam = ?");
    $cek->bindParam(1, $id_peminjam);
    $cek->execute();
    $jml = $cek->rowCount();

    if ($jml == 0) {
        $cekBuku = $con->prepare("SELECT * FROM buku WHERE id_buku = ?");
        $cekBuku->bindParam(1, $id_buku);
        $cekBuku->execute();
        $jmlBuku = $cekBuku->rowCount();

        if ($jmlBuku > 0) {
            $sql = "INSERT INTO peminjaman (id_peminjam, id_buku, nama_peminjam, tanggal_peminjaman) 
                    VALUES (:id_peminjam, :id_buku, :nama_peminjam, :tanggal_peminjaman)";
            $simpan = $con->prepare($sql);
            $simpan->bindParam('id_peminjam', $id_peminjam);
            $simpan->bindParam('id_buku', $id_buku);
            $simpan->bindParam('nama_peminjam', $nama_peminjam);
            $simpan->bindParam('tanggal_peminjaman', $tanggal_peminjaman);
            $simpan->execute();

            echo "<script>
                    alert('Data Berhasil Disimpan');
                    window.location.href = 'peminjam.php';
                </script>";
        } else {
            echo "<script>
                    alert('ID Buku tidak valid!');
                    window.location.href = 'peminjam.php';
                </script>";
        }
    } else {
        echo "<script>
                alert('Buku sudah Dipinjam!');
                window.location.href = 'peminjam.php';
            </script>";
    }
}
?>