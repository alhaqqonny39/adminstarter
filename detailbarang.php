<?php

  include 'config/app.php';
  
    //mengambil idbarang dari URL
  $id = (int)$_GET['idbarang'];
    // query sql barang
  $data_barang = select("SELECT * FROM barang WHERE idbarang=$id")[0];

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
    <table class="table table-bordered table-striped">
        <tr>
            <td>Nama Barang</td>
            <td><?=$data_barang['idbarang'];?></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><?=$data_barang['namabarang'];?></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><?=$data_barang['jumlah'];?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>Rp. <?= number_format($data_barang['harga'],0,',','.');?> </td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><?=date("d/m/Y | H:i:s", strtotime($data_barang['tanggal']));?></td>
        </tr>
        <tr>
            <td>Foto Barang</td>
            <td><img src="" alt=""></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>