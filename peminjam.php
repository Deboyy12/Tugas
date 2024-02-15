<?php
require_once 'koneksi.php';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TI3/E</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
    <nav class="navbar" style="background-color: transparent;">
        <a class="navbar-brand"></a>
        <form class="d-flex" role="search" method="GET" action="pencarian.php">
            <input class="form-control me-2" type="search" name="query" placeholder="Cari" aria-label="Cari">
            <button class="btn btn-outline-success" type="submit">Cari</button>
        </form>
    </nav>
    <br><br><a href="index.php" style="color: #808080; margin-left: 40px; margin-bottom: 40px;">
        <i class="fa-solid fa-house fa-3x"></i>
    </a>
    <div class="content">
        <h2><u>Input Peminjam</u></h2>
        <form action="peminjam_save.php" method="POST">
            <label for="">ID Peminjam</label><br>
            <input type="number" name="id_peminjam" required>
            <label for="">ID Buku</label><br>
            <select name="id_buku" required>
                <?php
                $bukuQuery = $con->query("SELECT * FROM buku");
                while ($bukuRow = $bukuQuery->fetch()) {
                    echo "<option value='" . $bukuRow['id_buku'] . "'>" . $bukuRow['judul_buku'] . "</option>";
                }
                ?>
            </select>
            <label for="">Nama Peminjam</label><br>
            <input type="text" name="nama_peminjam" required>
            <label for="">Tanggal Peminjam</label>
            <input type="text" name="tanggal_peminjaman" required>
            <input type="submit" name="submit_insert" value="Tambah" class="btn btn-primary">
            <input type="reset" name="reset_insert" value="Reset" class="btn btn-secondary">
            <br><br><br><br><br>
        </form>
    </div>
    <div class="content">
        <h2><u>Data Peminjam</u></h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Peminjam</th>
                    <th scope="col">ID Buku</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Peminjam</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = $con->query("SELECT * FROM peminjaman");
                $no = 1;
                while ($row = $sql->fetch()) {
                    ?>
                    <tr>
                        <th scope='row'>
                            <?php echo $no; ?>
                        </th>
                        <td>
                            <?php echo $row['id_peminjam'] ?>
                        </td>
                        <td>
                            <?php echo $row['id_buku'] ?>
                        </td>
                        <td>
                            <?php echo $row['nama_peminjam'] ?>
                        </td>
                        <td>
                            <?php echo $row['tanggal_peminjaman'] ?>
                        </td>
                        <td>
                            <a href="peminjam_edit.php?id_peminjam=<?php echo $row['id_peminjam']; ?>"
                                onclick="return confirm ('Apakah anda ingin mengedit data ini')"
                                class='btn btn-warning'>Edit</a>
                            <a href="peminjam_delete.php?id_peminjam=<?php echo $row['id_peminjam']; ?>"
                                onclick="return confirm ('Anda yakin ingin menghapus data ini')"
                                class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    <?php
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>