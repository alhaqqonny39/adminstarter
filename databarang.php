<?php include "layout/header.php"; ?>

    <div class="container mt-5">
      <h1>Data Produk Unit Produksi SMK Negeri 1 Bangsri</h1>
    <hr>
    <button type="button" class="btn btn-primary" href="form-tambah.php">Tambah</button>
      <div>
      <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No.</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
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
            <td width="15%" class="text-center"><button type="button" class="btn btn-primary">Edit</button>
            <button type="button" class="btn btn-danger">Hapus</button></td>
        </tr>

        <?php endforeach; ?>
        </tbody>
      </table>
      </div>
      </div>        
<?php include "layout/footer.php"; ?>  