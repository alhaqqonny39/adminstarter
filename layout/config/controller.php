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
    return $result;
    
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
  ?>

