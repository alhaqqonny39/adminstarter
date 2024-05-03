<?php include 'layout/header.php';

$data_barang = select("SELECT * FROM barang");
?>

    <div class="container mt-5">
      <h1>Data Produk Unit Produksi SMK Negeri 1 Bangsri</h1>
    <hr>
    <a href="tambahbarang.php" class="btn btn-primary mb-3">Tambah Barang</a>
      <table class="table table-bordered table-striped table-hover">
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
            <td width="20%" class="text-center">
            <a href="detailbarang.php?idbarang=<?=$barang['idbarang'];?>" class="btn btn-info">Detail</a>
            <a href="ubahbarang.php?idbarang=<?=$barang['idbarang'];?>" class="btn btn-warning">Edit</a>
            <a href="hapusbarang.php?idbarang=<?=$barang['idbarang'];?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</a>
</td>

        </tr>

        <?php endforeach; ?>
        </tbody>
      </table>
      </div>        
<?php include 'layout/footer.php'; ?>  