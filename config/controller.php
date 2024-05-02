<?php 

  include 'database.php';
  
//Fungsi untuk menampilkan (hanya read)
function select($query)
  {
    global $db;

    $result = mysqli_query($db, $query);
    $rows =[];

    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
    
  }


  //Fungsi untuk menambahkan data (create)
  function create_barang($post){

    global $db;

    $nama = $post['namabarang'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];
    
    //query tambah data
    $query = "INSERT INTO barang VALUES (null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
  }


  //Fungsi tambah siswa
  function create_siswa($post){

    global $db;
    
    $nama = $post['namasiswa'];
    $jk = $post['jeniskelamin'];
    $alamat = $post['alamat'];
    $ttl = $post['tanggallahir'];
    $foto = upload_file();
    //memeriksa upload file
    if(!$foto){
      return false;
    }
    //query tambah data
    $query = "INSERT INTO siswa VALUES (null,'$nama','$jk','$alamat','$ttl','$foto')";
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
    }

    //Fungsi tambah akun
  function create_akun($post){

    global $db;
    
    $nama = $post['nama'];
    $username = $post['username'];
    $email = $post['email'];
    $password1 = $post['password'];
    $level = $post['level'];
    
    //enkripsi password
    $password = password_hash($password1, PASSWORD_DEFAULT);

    //query tambah data
    $query = "INSERT INTO akun VALUES (null,'$nama','$username','$email','$password','$level')";
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
    }

  //Fungsi ubah data barang
    function update_barang($post){
    global $db;
    
    $id = $post['idbarang'];
    $nama = $post['namabarang'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];

  //query ubah data
  $query = "UPDATE barang SET namabarang = '$nama', jumlah = '$jumlah', harga = '$harga' WHERE idbarang = $id";
  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
  }

  //Fungsi ubah data siswa
  function update_siswa($post){
    global $db;
    
    $nis = $post['nis'];
    $nama = $post['namasiswa'];
    $jk = $post['jeniskelamin'];
    $alamat = $post['alamat'];
    $ttl = $post['tanggallahir'];

  //query ubah data
  $query = "UPDATE siswa SET namasiswa = '$nama', jeniskelamin = '$jk', alamat = '$alamat' WHERE nis = $nis";
  mysqli_query($db, $query);

  return mysqli_affected_rows($db);
  }

  //fungsi hapus barang
    function delete_barang($id){
    global $db;

    //query hapus data
    $query = "DELETE FROM barang WHERE idbarang=$id";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi hapus siswa
  function delete_siswa($id){
    global $db;

    //query hapus data
    $query = "DELETE FROM siswa WHERE nis=$id";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi hapus akun
  function delete_akun($id){
    global $db;

    //query hapus data
    $query = "DELETE FROM akun WHERE idakun=$id";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
  }

  //fungsi upload foto
  function upload_file()
  {
    $namaFile   = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error      = $_FILES['foto']['error'];
    $tmpName    = $_FILES['foto']['tmp_name'];

    // check file yang diupload
    $extensifileValid = ['jpg', 'jpeg', 'png'];
    $extensifile      = explode('.', $namaFile);
    $extensifile      = strtolower(end($extensifile));

    // check format/extensi file
    if (!in_array($extensifile, $extensifileValid)) {

        // pesan gagal
        echo "<script>
                alert('Format File Tidak Valid');
                document.location.href = 'tambahsiswa.php';
              </script>";
        die();
    }

    // check ukuran file 20 mb
    if ($ukuranFile > 20048000) {

        // pesan gagal
        echo "<script>
                alert('Ukuran File Max 2 MB');
                document.location.href = 'tambahsiswa.php';
              </script>";
        die();
    }

    // generate nama file baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensifile;

    // pindahkan ke folder local 
    move_uploaded_file($tmpName, 'assets/img/' . $namaFileBaru);
    return $namaFileBaru;
  }

  
  ?>


