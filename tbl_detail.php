<?php
require_once 'koneksi.php';

if (isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    $bookQuery = $con->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $bookQuery->execute([$id_buku]);
    $book = $bookQuery->fetch();

    $loanQuery = $con->prepare("SELECT * FROM peminjaman WHERE id_buku = ?");
    $loanQuery->execute([$id_buku]);
    $loan = $loanQuery->fetch();
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            background-color: #000;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 600px;
            text-align: center;
            margin: 20px 0;
        }

        h3 {
            color: #000000;
            margin-bottom: 20px;
            margin-right: 20px;
        }

        button {
            background-color: #000;
            color: white;
            border: none;
            padding: 15px 20px;
            border-radius: 50px;
            cursor: pointer;
            margin-right: 450px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
            color: #333;
        }

        th {
            background-color: #800000;
            color: white;
        }

        tr:hover {
            background-color: rgba(0, 0, 0, 0.1);
        }

        a {
            color: #808080;
            margin-left: 20px;
            margin-bottom: 20px;
            text-decoration: none;
            align-self: flex-start;
        }

        i.fa-house {
            margin-top: 20px;
            margin-left: 20px;
        }
    </style>

    <br><br><a href="index.php" style="color: #808080; margin-left: 40px; margin-bottom: 40px;">
        <i class="fa-solid fa-house fa-3x"></i>
    </a>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Buku</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
    <div class="content">
        <button onclick="window.location.href='buku.php'">Tambah Buku</button>
        <h3><u>Detail Buku</u></h3>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Atribut</th>
                    <th scope="col">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>ID Buku</td>
                    <td>
                        <?php echo $book['id_buku']; ?>
                    </td>
                </tr>

                <tr>
                    <td>ID Peminjam</td>
                    <td>
                        <?php echo $loan['id_peminjam']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Judul Buku</td>
                    <td>
                        <?php echo $book['judul_buku']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Pengarang</td>
                    <td>
                        <?php echo $book['pengarang']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Penerbit</td>
                    <td>
                        <?php echo $book['penerbit']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Tahun Buku</td>
                    <td>
                        <?php echo $book['tahun_buku']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Nama Peminjam</td>
                    <td>
                        <?php echo $loan['nama_peminjam']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Tanggal Peminjaman</td>
                    <td>
                        <?php echo $loan['tanggal_peminjaman']; ?>
                    </td>
                </tr>

                <tr>
                    <td>Status Peminjaman</td>
                    <td>
                        <?php
                        if ($loan) {
                            echo "Dipinjam oleh: " . $loan['nama_peminjam'] . " pada " . $loan['tanggal_peminjaman'];
                        } else {
                            echo "Belum Dipinjam";
                        }
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>