<?php
include 'config/app.php';

$id = (int)$_GET['idbarang'];

if(delete_barang($id) > 0){
    echo "<script>
            alert('Data Barag berhasil dihapus');
            document.location.href = 'databarang.php';
        </script>";
} else {
    echo "<script>
            alert('Data Barang gagal dihapus')
            document.location.href = 'databarang.php';
        </script>";
}

?>