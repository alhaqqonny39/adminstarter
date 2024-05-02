<?php

  include 'layout/header.php';
  
    //mengambil nis siswa dari URL
  $nis = (int)$_GET['nis'];
    // query sql siswa
  $data_siswa = select("SELECT * FROM siswa WHERE nis=$nis")[0];

?>


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