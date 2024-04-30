<?php 

  include 'layout/header.php';
    
  $id = (int)$_GET['idbarang'];
  $barang = select("SELECT * FROM barang WHERE idbarang = $id")[0];

  //check apakah tombol ubah ditekan
  if(isset($_POST['ubah'])){
    if(update_barang($_POST)>0){
      echo "<script>
            alert ('Data Barang Berhasil Diubah');
            document.location.href = 'databarang.php';
            </script>";

            }
            else{
      echo "<script>
            alert ('Data Barang Gagal Diubah');
            document.location.href = 'databarang.php';
            </script>";
    }
  }
  ?>
    <div class="container mt-5">
      <h1>Ubah Data Barang</h1>
    <hr>
    <form action="" method="post">
        <input type="hidden" name="idbarang" value="<?=$barang['idbarang'];?>">
      <div class="mb -3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" id="namabarang" name="namabarang" value="<?=$barang['namabarang'];?>" placeholder="Nama Barang" required>
      </div>
      <div class="mb -3">
        <label for="jumlah" class="form-label">Jumlah</label>
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