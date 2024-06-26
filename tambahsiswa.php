<?php 

  include 'layout/header.php';
  
  if(isset($_POST['tambah'])){
    if(create_siswa($_POST)>0){
      echo "<script>
            alert ('Data Siswa Berhasil Ditambahkan');
            document.location.href = 'datasiswa.php';
            </script>";

            }
            else{
      echo "<script>
            alert ('Data Siswa Gagal Ditambahkan');
            document.location.href = 'datasiswa.php';
            </script>";
    }
  }
  ?>
    <div class="container mt-5">
      <h1>Tambah Data Siswa</h1>
    <hr>
    <form action="" method="post" id="tambahsiswa" enctype="multipart/form-data">
      <div class="mb -3">
        <label for="nama" class="form-label">Nama Siswa</label>
        <input type="text" class="form-control" id="namasiswa" name="namasiswa" placeholder="Nama Siswa" required>
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
        <textarea class="form-control" placeholder="Alamat lengkap" id="alamat" name="alamat" required></textarea>               
      </div>
      <div class="form-group mb-3">
        <label for="tanggal">Tanggal Lahir :</label>
        <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" required>
        </div>
      
      <div class="form-group mb-3">
        <label for="foto" class="form-label">Foto :</label>
        <input type="file" class="form-control" name="foto" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" required>
      </div>

        <input type="submit" class="btn btn-primary" style="float: right;" name="tambah">
        <button type="button" class="btn btn-danger" style="float: right;" onclick="clearForm()">Reset</button>    
        </form>
        <script>
            function clearForm() {
            document.getElementById("tambahsiswa").reset();
                }
        </script>
    </div>   

<?php include 'layout/footer.php'; ?>