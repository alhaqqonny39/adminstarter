<?php

session_start();

// membatasi halaman sebelum login
// if (!isset($_SESSION["login"])) {
//     echo "<script>
//             alert('login dulu dong');
//             document.location.href = 'login.php';
//           </script>";
//     exit;
// }

// // membatasi halaman sesuai user login
// if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2) {
//     echo "<script>
//             alert('Perhatian anda tidak punya hak akses');
//             document.location.href = 'akun.php';
//           </script>";
//     exit;
// }

$title = 'Daftar Transaksi';

include 'layout/header.php';

$sql = "SELECT * FROM barang";
$barang = mysqli_query($db, $sql);
?>

<?php
// Proses penambahan barang ke dalam keranjang belanja
if (isset($_POST['simpan_transaksi'])) {
  foreach ($_POST['jumlah'] as $idbarang => $jumlah) {
    // Pastikan jumlah yang dinputkan adalah angka positif
    if ($jumlah > 0) {
      // Ambil detail barang dari database berdasarkan ID
      $sql = "SELECT * FROM barang WHERE idbarang = '$idbarang'";
      $result = $db->query($sql);
      if ($result->num_rows > 0) {
        $barang = $result->fetch_assoc();
        if (isset($_SESSION['KeranjangBelanja'][$idbarang])) {
          $_SESSION['KeranjangBelanja'][$idbarang]['jumlah'] += $jumlah;
        } else {
          $_SESSION['KeranjangBelanja'][$idbarang] = array(
            'idbarang' => $barang['idbarang'],
            'barcode' => $barang['barcode'],
            'nama' => $barang['nama'],
            'harga' => $barang['harga'],
            'jumlah' => $jumlah
          );
        }
        echo '<script>';
        echo "window.location.href = 'tambah-transaksi.php';";
        echo '</script>';
      } else {
        echo '<script>';
        echo 'alert("Barang tidak ditemukan.");';
        echo '</script>';
      }
    }
  }
}
?>

<?php
// Proses penambahan barang ke dalam keranjang belanja
if (isset($_POST['barcode'])) {
  $barcode = $_POST['barcode'];
  $jumlah = 1;

  $sql = mysqli_query($db, "SELECT * FROM barang WHERE barcode = '$barcode'");

  $b = mysqli_fetch_assoc($sql);

  if ($jumlah > 0) {
    // Ambil detail barang dari database berdasarkan ID
    $sql = "SELECT * FROM barang WHERE barcode = '$barcode'";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
      $barang = $result->fetch_assoc();
      // Periksa apakah barang sudah ada dalam keranjang belanja
      if (isset($_SESSION['KeranjangBelanja'][$barcode])) {
        // Jika sudah ada, tambahkan jumlahnya dengan jumlah baru
        $_SESSION['KeranjangBelanja'][$barcode]['jumlah'] += $jumlah;
      } else {
        $_SESSION['KeranjangBelanja'][$barcode] = array(
          'idbarang' => $barang['idbarang'],
          'barcode' => $barang['barcode'],
          'nama' => $barang['nama'],
          'harga' => $barang['harga'],
          'jumlah' => $jumlah
        );
      }
    }
  }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-list"></i> Tambah transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Keranjang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Main content -->

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tabel Data transaksi</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Masukkan Kode Barang" name="barcode">
                        </div>
                    </form>

                    <form action="#" method="POST">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>jumlah</th>
                                <th>Sub Total</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            // Deklarasikan variabel total untuk menyimpan total harga
                            $total = 0;
                            if (!empty($_SESSION['KeranjangBelanja'])) :
                              foreach ($_SESSION['KeranjangBelanja'] as $idbarang => $item) {
                                // Hitung harga untuk item saat ini sesuai dengan jumlah yang dibeli
                                $harga = $item['harga'] * $item['jumlah'];
                                $total += $harga;
                            ?>
                                <tr>
                                  <td><img alt="barcode" src="barcode.php?codetype=Code128&size=15&text=<?= $item['barcode']; ?>&print=true" /></td>
                                  <td><?= $item['nama'] ?></td>
                                  <td><?= number_format($item['harga'], 0, ',', '.') ?></td>
                                  <td><?= $item['jumlah'] ?></td>
                                  <td><?= number_format($harga, 0, ',', '.') ?></td>
                                  <td>
                                    <?= '<button type="submit" class="btn btn-danger badge" name="hapus[' . $idbarang . ']">-</button>' ?>
                                  </td>
                                </tr>
                              <?php } ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?= '<span>Total (IDR)</span>'; ?>
                    <?= '<strong>' . "Rp " . number_format($total, 0, ',', '.') . '</strong>'; ?>
                </div>
            </div>
            <button type="submit" name="tambah_transaksi" class="btn btn-primary">tambah transaksi</button>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <?php
  // Periksa apakah data yang dihapus ada dalam $_POST['hapus']
    if (isset($_POST['hapus'])) {
      // Loop untuk setiap barang yang dihapus
      foreach ($_POST['hapus'] as $idbarang => $value) {
        // Hapus barang dari keranjang belanja berdasarkan ID barang
        if (isset($_SESSION['KeranjangBelanja'][$idbarang])) {
          unset($_SESSION['KeranjangBelanja'][$idbarang]);
          // Redirect kembali ke halaman keranjang belanja setelah penghapusan
          // header("Location: tambah-transaksi.php");
        }
      }
    }
    ?>
    <!-- /.content -->
</div>

<?php
// Tambah Data Transaksi
if (isset($_POST['tambah_transaksi'])) {
  $bayar = $_POST['bayar'];
  $idbarang = $item['idbarang'];
  $jumlah = $item['jumlah'];
  $sql = mysqli_query($db, "INSERT INTO transaksi VALUES ('$id_transaksi', '$idbarang', '$jumlah', '$total',  NOW())");

  $_SESSION['KeranjangBelanja'] = array();
  echo '<script>';
  echo 'alert("Data berhasil disimpan");';
  echo 'window.location.href = "transaksi.php"';
  echo '</script>';
}
?>

<?php include 'layout/footer.php'; ?>