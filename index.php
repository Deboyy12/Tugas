<!DOCTYPE html>
<html>

<head>
  <style>
    body {
      background-image: url('index.jpg');
      background-size: cover;
    }
  </style>
  <meta charset="UTF-8">
  <title>TI3/E</title>
  <link rel="stylesheet" type="text/css" href="Style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar" style="background-color: #e3f2fd;">
    <div class="container-fluid">
      <form class="d-flex" role="search" method="GET" action="pencarian.php">
        <input class="form-control me-2" type="search" name="query" placeholder="Cari" aria-label="Cari">
        <button class="btn btn-outline-success" type="submit">Cari</button>
      </form>
      <a class="navbar-brand" style=" font-size: 200%; position: absolute; right: 730px; left: 730px;">WEB PROGRAMMING
        2</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
        aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
        aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MASTER BOOK</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a style="color: #ffffff;" class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a style="color: #ffffff;" class="nav-link" href="buku.php">Data Buku</a>
            </li>
            <li class="nav-item">
              <a style="color: #ffffff;" class="nav-link" href="peminjam.php">Data Peminjam</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  </header><br><br><br><br><br><br><br><br><br>
  <img src="ITB.jpg" alt=""><br><br><br><br><br>

  <footer>
    <b>
      <p style="color: black; font-size: 120%;"> &copy; 2023/2024</p>
    </b><br><br><br>
  </footer>
</body>

</html>