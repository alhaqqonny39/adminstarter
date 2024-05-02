<?php 
  include 'layout/header.php';
  $data_akun = select("SELECT * FROM akun");

  if(isset($_POST['tambah'])){
    if(create_akun($_POST)>0){
      echo "<script>
            alert ('Data Siswa Berhasil Ditambahkan');
            document.location.href = 'akunmodal.php';
            </script>";

            }
            else{
      echo "<script>
            alert ('Data Siswa Gagal Ditambahkan');
            document.location.href = 'akunmodal.php';
            </script>";
    }
  }

?>

    <div class="container mt-5">
      <h1>Data Akun User</h1>
        <hr>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modaltambah">
          Modal Tambah
          </button>
          <table class="table table-bordered table-striped">
           <thead>
             <tr>
            <th>No.</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
          <?php $no=1; ?>
          <?php foreach ($data_akun as $akun) : ?>
        <tr>
            <td><?=$no++; ?></td>
            <td><?=$akun['nama'];?></td>
            <td><?=$akun['username'];?></td>
            <td><?=$akun['email'];?></td>
            <td><?=$akun['password'];?></td>
            <td width="20%" class="text-center">
            <a href="#" class="btn btn-warning mb-2">Edit</a>
            <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#modalhapus<?$akun['idakun'];?>">Hapus</button>
            </td>

        </tr>

        <?php endforeach; ?>
        </tbody>
      </table>
      </div>  

<!-- Modal Tambah -->
<div class="modal fade" id="modaltambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" id="tambahsiswa" enctype="multipart/form-data">
          <div class="mb -3">
            <label for="nama" class="form-label">Nama Akun</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Akun" required>
          </div>
          <div class="mb -3">
            <label for="username" class="form-label">Nama Akun</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
          </div>
          <div class="mb -3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
          </div>
          <div class="mb -3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required minlength="6">
          </div>
          <div class="mb -3">
            <label for="level" class="form-label">Level</label>  
                <select class="form-select" id="level" name="level">
                <option selected>Pilih salah satu</option>
                <option value="1">Admin</option>
                <option value="2">Operator Siswa</option>
                <option value="3">Operator Barang</option>
                </select>
            </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal hapus-->
<div class="modal fade" id="modalhapus<?$akun['idakun'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin ingin menghapus akun : <?=$akun['nama'];?> ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="hapusakun.php?idakun<?=$akun['idakun'];?>" class="btn btn-danger" name="hapus">Hapus</a>
      </div>
    </div>
  </div>
</div>
<?php include 'layout/footer.php'; ?>  