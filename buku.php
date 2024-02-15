<?php
require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      background-image: url('img/buku.jpg');
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
    <h2><u>Input Buku</u></h2>
    <form action="buku_save.php" method="POST">
      <label for="">ID Buku</label><br>
      <input type="number" name="id_buku" required>
      <label for="">Judul Buku</label><br>
      <input type="text" name="judul_buku" required>
      <label for="">Pengarang</label>
      <input type="text" name="pengarang" required>
      <label for="">Penerbit</label>
      <input type="text" name="penerbit" required>
      <label for="">Tahun Buku</label>
      <input type="number" name="tahun_buku" required>
      <input type="submit" name="submit_insert" value="Tambah">
      <input type="reset" name="reset_insert" value="Reset">
      <br><br><br><br><br>
    </form>
  </div>
  <h2><u>Data Buku</u></h2>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">ID Buku</th>
        <th scope="col">Judul Buku</th>
        <th scope="col">Pengarang</th>
        <th scope="col">Penerbit</th>
        <th scope="col">Tahun Buku</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = $con->query("SELECT * FROM buku");
      $no = 1;
      while ($row = $sql->fetch()) { ?>
        <tr>
          <th scope='row'>
            <?php echo $no; ?>
          </th>
          <td>
            <?php echo $row['id_buku'] ?>
          </td>
          <td>
            <?php echo $row['judul_buku'] ?>
          </td>
          <td>
            <?php echo $row['pengarang'] ?>
          </td>
          <td>
            <?php echo $row['penerbit'] ?>
          </td>
          <td>
            <?php echo $row['tahun_buku'] ?>
          </td>
          <td>
            <a href="buku_edit.php&id_buku=<?php echo $row['id_buku']; ?>"
              onclick="return confirm ('Apakah anda ingin mengedit data ini')" class='btn btn-warning'>Edit</a>
            <a href="buku_delete.php&id_buku=<?php echo $row['id_buku']; ?>"
              onclick="return confirm ('Anda yakin ingin menghapus data ini')" class='btn btn-danger'>Hapus</a>
            <a href="tbl_detail.php&id_buku=<?php echo $row['id_buku']; ?>" class='btn btn-info'>Detail</a>
          </td>
        </tr>
        <?php
        $no++;
      }
      ?>
    </tbody>
  </table>
  </div>

</html>