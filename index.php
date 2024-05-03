
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
  

  include 'layout/header.php';

  $data_barang = select("SELECT * FROM barang");
  
  ?>
      <!-- Optional JavaScript; choose one of the two! -->
      <div class="container mt-5">
      <h1>Unit Produksi SMK Negeri 1 Bangsri</h1>
    <hr>
    <!-- <button type="button" class="btn btn-primary">Tambah</button> -->
      <div>
      <table class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
            <th>No.</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
            <th>Tanggal</th>
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
        </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
      </div>
      </div>        
    <?php
    include 'layout/footer.php';
    ?>