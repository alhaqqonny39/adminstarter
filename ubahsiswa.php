<?php 

  include 'layout/header.php';
    
  $id = (int)$_GET['nis'];
  $siswa = select("SELECT * FROM siswa WHERE nis = $id")[0];

  //check apakah tombol ubah ditekan
  if(isset($_POST['ubah'])){
    if(update_siswa($_POST)>0){
      echo "<script>
            alert ('Data Siswa Berhasil Diubah');
            document.location.href = 'datasiswa.php';
            </script>";

            }
            else{
      echo "<script>
            alert ('Data Siswa Gagal Diubah');
            document.location.href = 'datasiswa.php';
            </script>";
    }
  }
  ?>
    <div class="container mt-5">
      <h1>Ubah Data Siswa</h1>
    <hr>
    <form action="" method="post">
        <input type="hidden" name="nis" value="<?=$siswa['nis'];?>">
      <div class="mb -3">
        <label for="nama" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control" id="namasiswa" name="namasiswa" value="<?=$siswa['namasiswa'];?>" placeholder="Nama Siswa" required>
      </div>
      <div class="mb -3">
        <label for="jumlah" class="form-label">Jenis Kelamin</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" value="<?=$barang['jumlah'];?>" placeholder="Jumlah Barang" required>
      </div>
      <div class="mb -3">
        <label for="harga" class="form-label">Harga Barang</label> 
        <input type="number" class="form-control" id="harga" name="harga" value="<?=$harga['harga'];?>" placeholder="Harga Barang" required>               
      </div>
        <button type="submit" class="btn btn-primary" style="float: right;" name="ubah">Ubah Data</button>
        </form>
    </div>   

<?php include 'layout/footer.php'; ?>