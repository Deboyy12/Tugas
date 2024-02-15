<?php
require_once 'koneksi.php';

$id_buku = $_GET['id_buku'];
$cari = $con->prepare("SELECT * FROM buku WHERE id_buku = ?");
$cari->bindParam(1, $id_buku);
$cari->execute();

$jml = $cari->rowCount();
if ($jml == 0) {
    echo "<script>
        alert('id_buku tidak ada!');
        window.location.href = 'buku.php';
    </script>";
} else {
    $data = $cari->fetch();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            body {
                background-image: url('buku.jpg');
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
        <a href="index.php" style="color: #808080;">
            <i class="fa-solid fa-house"></i>
        </a>
    </head>

    <body>
        <div class="content">
            <h2><u>Edit Mata Kuliah</u></h2>
            <form action="matakuliah_update.php" method="POST">
                <label for="">ID Buku</label>
                <input type="number" name="id_buku" value="<?= $data['id_buku'] ?>" required readonly>
                <label for="">Judul Buku</label>
                <input type="text" name="judul_buku" value="<?= $data['judul_buku'] ?>" required>
                <label for="">Pengarang</label>
                <input type="text" name="pengarang" value="<?= $data['pengarang'] ?>" required>
                <label for="">penerbit</label>
                <input type="text" name="penerbit" value="<?= $data['penerbit'] ?>" required>
                <label for="">Tahun Buku</label>
                <input type="number" name="tahun_buku" value="<?= $data['tahun_buku'] ?>" required>
                <br><br>
                <input type="submit" name="submit_update" value="Update">
                <input type="reset" name="reset_insert" value="Reset">
            </form>
        </div>
    </body>

    </html>
<?php } ?>