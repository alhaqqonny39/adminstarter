<?php

  require __DIR__.'/vendor/autoload.php';
  require 'config/app.php';
  use Spipu\Html2Pdf\Html2Pdf;
    
  try {
    $data_siswa = select("SELECT * FROM siswa");

    $content = '<style type="text/css">
        .gambar {
            width: 50px;
        }
    </style>';

    $content .= '
    <page>
        <table border="1" align="center">
            <tr>
                <th>NIS</th>
                <th>Nama siswa</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>tanggal Lahir</th>
                <th>Foto</th>
            </tr>';

    $no = 1;
    foreach ($data_siswa as $siswa) {
        $content .='
            <tr>
                <td>'.$no++.'</td>
                <td>'.$siswa['namasiswa'].'</td>
                <td>'.$siswa['jeniskelamin'].'</td>
                <td>'.$siswa['alamat'].'</td>
                <td>'.$siswa['tanggallahir'].'</td>                
                <td><img src="assets/img/' . $siswa['foto'] . '" class="gambar"></td>
            </tr>
        ';
    }
    
    $content .= '
        </table>
    </page>';

    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($content);
    ob_start();
    $html2pdf->output('laporansiswa.pdf');
    } catch (Exception $e) {
    echo 'Terjadi kesalahan: ' . $e->getMessage();
    }
?>