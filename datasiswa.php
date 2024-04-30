<?php

  include 'layout/header.php';
  $data_siswa = select("SELECT * FROM siswa");
?>

     <div class="container mt-5">
      <h1>Data Siswa</h1>
    <hr>
    <a href="tambahsiswa.php" class="btn btn-primary mb-3">Tambah Siswa</a>
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          <?php foreach ($data_siswa as $siswa) : ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$siswa['nis'];?></td>
            <td><?=$siswa['namasiswa'];?></td>
            <td><?=$siswa['jeniskelamin'];?></td>
            <td><?=$siswa['alamat'];?></td>
            <td><?=date("d/m/Y", strtotime($siswa['tanggallahir']));?></td>
            <td width="15%" class="text-center"><button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-danger">Hapus</button></td>
        </tr>
        <!-- <tr>
            <td>T002</td>
            <td>Dudukan Senjata</td>
            <td>5</td>
            <td>100000</td>
            <td>29/04/2024</td>
            <td width="15%" class="text-center"><button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-danger">Hapus</button></td>
        </tr> -->
        <?php endforeach; ?>
        </tbody>
      </table>
      </div>        
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>