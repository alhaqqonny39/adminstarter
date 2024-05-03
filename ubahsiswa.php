<?php 

  include 'layout/header.php';
    
  $nis = (int)$_GET['nis'];
  $siswa = select("SELECT * FROM siswa WHERE nis = $nis")[0];

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
      <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>  
      <select class="form-select" id="jeniskelamin" name="jeniskelamin">
            <?php $jk = $siswa['jeniskelamin'];?>
            <option value="L" <?= $jk == 'L' ? 'selected' : null?>>Laki-laki</option>
            <option value="P" <?= $jk == 'P' ? 'selected' : null?>>Perempuan</option>
        </select>
      </div>
      <div class="mb -3">
        <label for="alamat">Alamat</label> 
        <textarea class="form-control" placeholder="Alamat lengkap" id="alamat" name="alamat" value="<?=$siswa['alamat'];?>"></textarea>               
      </div>
      <div class="form-group mb-3">
        <label for="tanggal">Tanggal Lahir :</label>
        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?=$siswa['tanggallahir'];?>">
        </div>
      
      <div class="form-group mb-3">
        <label for="foto">Foto :</label>
        <input class="form-control" id="foto" name="foto" value="<?=$siswa['foto'];?>">
      </div>

        <input type="submit" class="btn btn-primary" style="float: right;" name="ubah">    
        </form>
    </div>   

<?php include 'layout/footer.php'; ?>