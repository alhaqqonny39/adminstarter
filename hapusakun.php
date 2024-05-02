<?php

include 'config/app.php';

$id = (int)$_GET['idakun'];

if(delete_akun($id) > 0){
    echo "<script>
            alert('Data Akun berhasil dihapus');
            document.location.href = 'akunmodal.php';
        </script>";
} else {
    echo "<script>
            alert('Data Akun gagal dihapus')
            document.location.href = 'akunmodal.php';
        </script>";
}

?>
