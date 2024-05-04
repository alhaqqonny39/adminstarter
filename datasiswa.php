<?php
   session_start();
   //membatasi halaman sebelum login
   if(!isset($_SESSION['login'])){
     echo"<script>
         alert('silakan login terlebih dahulu');
         document.location.href = 'login.php';
         </script>";
     exit;
   }
 
   //membatasi halaman sesuai user login
   if($_SESSION['level']!= 2){
    echo"<script>
        alert('Anda harus masuk sebagai admin siswa');
        document.location.href = 'login.php';
        </script>";
    exit;
  }

  include 'layout/header.php';
  //$data_siswa = select("SELECT * FROM siswa");
  //query tampil data dengan pagination
$stokDataPerhalaman = 5;
$stokData     = count(select("SELECT * FROM siswa"));
$stokHalaman  = ceil($stokData / $stokDataPerhalaman);
$halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman']:1);
$awalData = ($stokDataPerhalaman * $halamanAktif) - $stokDataPerhalaman;

$data_siswa = select("SELECT * FROM siswa ORDER BY nis DESC LIMIT $awalData, $stokDataPerhalaman");
?>

     <div class="container mt-5">
      <h1>Data Siswa</h1>
    <hr>
    <a href="tambahsiswa.php" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i>Tambah Siswa</a>
    <a href="downloadexcelsiswa.php" class="btn btn-success mb-3"><i class="fas fa-file-excel"></i>Unduh Data Siswa</a>
    <a href="downloadpdfsiswa.php" class="btn btn-dark mb-3"><i class="fas fa-file-pdf"></i>Unduh Data Siswa</a>
      <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Foto</th>
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
            <td><?=$siswa['foto'];?></td>
            <td width="20%" class="text-center">
            <a href="detailsiswa.php?nis=<?=$siswa['nis'];?>" type="button" class="btn btn-info">Detail</a>  
            <a href="ubahsiswa.php?nis=<?=$siswa['nis'];?>" type="button" class="btn btn-primary">Edit</a>
            <a href="hapussiswa.php?nis=<?=$siswa['nis'];?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data siswa ini?')">Hapus</a>
        </tr>
      
        <?php endforeach; ?>
        </tbody>
      </table>
      <div class="mt-2 justify-content-end d-flex">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php if ($halamanAktif > 1) : ?>
            <li class="page-item">
              <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
              </a>
            </li>
          <?php endif; ?>

          <?php for ($i = 1; $i <= $stokHalaman; $i++) : ?>
            <?php if ($i == $halamanAktif) : ?>
              <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
            <?php else : ?>
              <li class="page-item "><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
            <?php endif; ?>
          <?php endfor; ?>

          <?php if ($halamanAktif < $stokHalaman) : ?>
            <li class="page-item">
              <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
              </a>
            </li>
          <?php endif; ?>
        </ul>
      </nav>
      </div>
    </div>        
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>