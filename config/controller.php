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
    
    //query tambah data
    $query = "INSERT INTO siswa VALUES (null,'$nama','$jk','$alamat','$ttl')";
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

  //query untuk detail siswa

  
  ?>


