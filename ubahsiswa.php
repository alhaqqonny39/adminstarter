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
      <h1>Tambah Data Siswa</h1>
    <hr>
    <form action="" method="post" id="ubahsiswa">
    <input type="hidden" name="idbarang" value="<?=$siswa['nis'];?>">
      <div class="mb -3">
        <label for="nama" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control" id="namasiswa" name="namasiswa" value="<?=$siswa['namasiswa'];?>" placeholder="Nama Siswa" required>
      </div>
      <div class="mb -3">
      <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>  
      <select class="form-select" id="jeniskelamin" name="jeniskelamin">
            <option selected>Pilih salah satu</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="mb -3">
        <label for="alamat">Alamat</label> 
        <textarea class="form-control" placeholder="Alamat lengkap" id="alamat" name="alamat" value="<?=$siswa['namasiswa'];?>"></textarea>               
      </div>
      <div class="form-group mb-3">
        <label for="tanggal">Tanggal Lahir :</label>
        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="<?=$siswa['tanggallahir'];?>">
        </div>

        <input type="submit" class="btn btn-primary" style="float: right;" name="ubah">
        <button type="button" class="btn btn-danger" style="float: right;" onclick="clearForm()">Reset</button>    
        </form>
        <script>
            function clearForm() {
            document.getElementById("tambahsiswa").reset();
                }
        </script>
    </div>   

<?php include 'layout/footer.php'; ?>