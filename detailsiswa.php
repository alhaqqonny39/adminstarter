<?php

  include 'config/app.php';
  
    //mengambil nis siswa dari URL
  $nis = (int)$_GET['nis'];
    // query sql siswa
  $data_siswa = select("SELECT * FROM siswa WHERE nis=$nis")[0];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>UP SMKN 1 Bangsri</title>
  </head>
  <body>
    <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">UP SMK</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="databarang.php">Data Barang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="datasiswa.php">Data Siswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Data User</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Sewa Gedung</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Cetak Merchandise</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Jasa Pembuatan Website dan Aplikasi</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Jasa Bengkel Motor</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
    </div>

     <div class="container mt-5">
      <h1>Detail Data Siswa</h1>
    <hr>
      <table class="table table-bordered table-striped">
        <tr>
            <td>NIS</td>
            <td><?=$data_siswa['nis'];?></td>
        </tr>
        <tr>
            <td>Nama Siswa</td>
            <td><?=$data_siswa['namasiswa'];?></td>
            </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?=$data_siswa['jeniskelamin'];?></td>
            </tr>
        <tr>
            <td>Alamat</td>
            <td><?=$data_siswa['alamat'];?></td>
            </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td><?=date("d/m/Y", strtotime($data_siswa['tanggallahir']));?></td>
        </tr>
        <tr>
            <td>Foto</td>
            <td><a href="assets/img/<?=$data_siswa['foto'];?>"><img src="assets/img/<?=$data_siswa['foto'];?>" alt="foto" width="50%">
                </a>
            </td>
        </tr>
      </table>
      <a href="datasiswa.php" class="btn btn-secondary" style="float:left">Kembali</a>
      </div>        
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>