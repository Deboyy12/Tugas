<?php
require_once 'koneksi.php';

$id_peminjam = $_GET['id_peminjam'];
$cari = $con->prepare("SELECT * FROM peminjaman WHERE id_peminjam = ?");
$cari->bindParam(1, $id_peminjam);
$cari->execute();

$jml = $cari->rowCount();
if ($jml == 0) {
    echo "<script>
        alert('id_peminjam tidak ada!');
        window.location.href = 'peminjam.php';
    </script>";
} else {
    $data = $cari->fetch();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            body {
                background-image: url('peminjaman.jpg');
                background-size: cover;
            }
        </style>
        <br><br><a href="index.php" style="color: #808080; margin-left: 40px; margin-bottom: 40px;">
            <i class="fa-solid fa-house fa-3x"></i>
        </a>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TI3/E</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <link rel="stylesheet" href="Style.css">
    </head>

    <body>
        <div class="content">
            <h2><u>Edit Peminjam</u></h2>
            <form action="paminjam_update.php" method="POST">
                <label for="">ID Peminjam</label>
                <input type="number" name="id_peminjam" value="<?= $data['id_peminjam'] ?>" required readonly>
                <label for="">ID Buku</label>
                <input type="number" name="id_buku" value="<?= $data['id_buku'] ?>" required readonly>
                <label for="">Nama Peminjam</label>
                <input type="text" name="nama_peminjam" value="<?= $data['nama_peminjam'] ?>" required>
                <label for="">Tanggal_Peminjaman</label>
                <input type="text" name="tanggal_peminjaman" value="<?= $data['tanggal_peminjaman'] ?>" required>
                <input type="submit" name="submit_update" value="Update">
                <input type="reset" name="reset_insert" value="Reset">
            </form>
        </div>
    </body>

    </html>
<?php } ?>