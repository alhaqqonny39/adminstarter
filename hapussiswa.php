<?php
include 'config/app.php';

$id = (int)$_GET['nis'];

if(delete_siswa($id) > 0){
    echo "<script>
            alert('Data Siswa berhasil dihapus');
            document.location.href = 'databarang.php';
        </script>";
} else {
    echo "<script>
            alert('Data Siswa gagal dihapus')
            document.location.href = 'databarang.php';
        </script>";
}

?>
