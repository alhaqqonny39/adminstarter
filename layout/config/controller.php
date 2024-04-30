<?php 

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

    $nama = $post['nama'];
    $jumlah = $post['jumlah'];
    $harga = $post['harga'];
    
    //query tambah data
    $query = "INSERT INTO barang VALUES (null,'$nama','$jumlah','$harga',CURRENT_TIMESTAMP())";
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
  }
  ?>