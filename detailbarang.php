<?php

  include 'layout/header.php';
  
    //mengambil idbarang dari URL
  $id = (int)$_GET['idbarang'];
    // query sql barang
  $data_barang = select("SELECT * FROM barang WHERE idbarang=$id")[0];

?>


    <table class="table table-bordered table-striped">
        <tr>
            <td>Nama Barang</td>
            <td><?=$data_barang['idbarang'];?></td>
        </tr>
        <tr>
            <td>Nama Barang</td>
            <td><?=$data_barang['namabarang'];?></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td><?=$data_barang['jumlah'];?></td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>Rp. <?= number_format($data_barang['harga'],0,',','.');?> </td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><?=date("d/m/Y | H:i:s", strtotime($data_barang['tanggal']));?></td>
        </tr>
        <tr>
            <td>Foto Barang</td>
            <td><a href="assets/img/<?=$data_barang['foto'];?>"><img src="assets/img/<?=$data_barang['foto'];?>" alt="foto" width="50%">
                </a></td>
        </tr>
        </tbody>
      </table>