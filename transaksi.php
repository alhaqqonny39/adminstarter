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

if (isset($_POST['filter'])) {
    $tgl_awal = strip_tags($_POST['tgl_awal'] . " 00:00:00");
    $tgl_akhir = strip_tags($_POST['tgl_akhir'] . " 23:59:59");


    // query filter data
    $data_transaksi = select("SELECT * FROM transaksi WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY id_transaksi DESC ");
} else {
    // query tampil data dengan pagination 
    $jumlahDataPerhalaman = 10;
    $jumlahData = count(select("SELECT * FROM transaksi"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1);
    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

    $data_transaksi = select("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT $awalData, $jumlahDataPerhalaman");
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><i class="fas fa-list"></i> Data transaksi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data transaksi</li>
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
                    <a href="tambah-transaksi.php" class="btn btn-primary btn-sm mb-2"><i class="fas fa-plus"></i> Tambah</a>

                    <button type="button" class="btn btn-success btn-sm mb-2" data-toggle="modal" data-target="#modalFilter">
                        <i class="fas fa-search"></i>
                        Filter Data
                    </button>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Id_Transaksi</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Tanggal Transaksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($data_transaksi as $transaksi) : ?>
                                <tr>
                                    <td><?= @$awalData += 1; ?></td>
                                    <td><?= $transaksi['id_transaksi']; ?></td>
                                    <td><?= $transaksi['jumlah']; ?></td>
                                    <td>Rp. <?= number_format($transaksi['total'], 0, ',', '.'); ?></td>
                                    <td><?= date('d/m/Y | H:i:s', strtotime($transaksi['tanggal_transaksi'])); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="mt-2 justify-content-end d-flex">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <?php if (@$halamanAktif > 1) : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?halaman=<?= $halamanAktif - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= @$jumlahHalaman; $i++) : ?>
                                    <?php if ($i == $halamanAktif) : ?>
                                        <li class="page-item active"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php else : ?>
                                        <li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if (@$halamanAktif < @$jumlahHalaman) : ?>
                                <li class="page-item">
                                    <a class="page-link" href="?halaman=<?= $halamanAktif + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal Filter -->
<div class="modal fade" id="modalFilter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-search"></i> Filter Data</h5>
                <button type="button" class="close" data-toggle="modal" aria-label="Close" data-target="#modalFilter">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">

                    <div class="form-group">
                        <label for="tgl_awal">Tanggal Awal</label>
                        <input type="date" name="tgl_awal" id="tgl_awal" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="tgl_akhir">Tanggal Akhir</label>
                        <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success btn-sm" name="filter">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<?php include 'layout/footer.php'; ?>