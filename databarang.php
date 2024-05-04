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
 if($_SESSION['level']!= 3){
  echo"<script>
      alert('Anda harus masuk sebagai admin barang');
      document.location.href = 'login.php';
      </script>";
  exit;
}

include 'layout/header.php';

//$data_barang = select("SELECT * FROM barang");
//query tampil data dengan pagination
$stokDataPerhalaman = 5;
$stokData     = count(select("SELECT * FROM barang"));
$stokHalaman  = ceil($stokData / $stokDataPerhalaman);
$halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman']:1);
$awalData = ($stokDataPerhalaman * $halamanAktif) - $stokDataPerhalaman;

$data_barang = select("SELECT * FROM barang ORDER BY idbarang DESC LIMIT $awalData, $stokDataPerhalaman");

?>

    <div class="container mt-5">
      <h1>Data Produk Unit Produksi SMK Negeri 1 Bangsri</h1>
    <hr>
    <a href="tambahbarang.php" class="btn btn-primary mb-3"><i class="fas fa-plus-circle"></i>Tambah Barang</a>
    <a href="downloadpdfbarang.php" class="btn btn-dark mb-3"><i class="fas fa-file-pdf"></i>Unduh Data Barang</a>
    <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>No.</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
            <th>Barcode</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          <?php foreach ($data_barang as $barang) : ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$barang['idbarang'];?></td>
            <td><?=$barang['namabarang'];?></td>
            <td><?=$barang['jumlah'];?></td>
            <td>Rp. <?= number_format($barang['harga'],0,',','.');?> </td>
            <td><?=date("d/m/Y | H:i:s", strtotime($barang['tanggal']));?></td>
            <td width="20%" class="text-center">
            <a href="detailbarang.php?idbarang=<?=$barang['idbarang'];?>" class="btn btn-info">Detail</a>
            <a href="ubahbarang.php?idbarang=<?=$barang['idbarang'];?>" class="btn btn-warning">Edit</a>
            <a href="hapusbarang.php?idbarang=<?=$barang['idbarang'];?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
</td>

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
<?php include 'layout/footer.php'; ?>  