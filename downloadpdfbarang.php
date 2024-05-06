<?php

  require __DIR__.'/vendor/autoload.php';
  require 'config/app.php';
  use Spipu\Html2Pdf\Html2Pdf;
    
  try {
    $data_barang = select("SELECT * FROM barang");

    $content = '<style type="text/css">
        .gambar {
            width: 50px;
        }
    </style>';

    $content .= '
    <page>
        <table border="1" align="center">
            <tr>
                <th>ID Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Harga Barang</th>
                <th>Tanggal</th>
                <th>Barcode</th>
            </tr>';

    $no = 1;
    foreach ($data_barang as $barang) {
        $content .='
            <tr>
                <td>'.$no++.'</td>
                <td>'.$barang['idbarang'].'</td>
                <td>'.$barang['namabarang'].'</td>
                <td>'.$barang['jumlah'].'</td>
                <td>'.$barang['harga'].'</td>
                <td>'.$barang['barcode'].'</td>
            </tr>
        ';
    }
    
    $content .= '
        </table>
    </page>';

    $html2pdf = new Html2Pdf();
    $html2pdf->writeHTML($content);
    ob_start();
    $html2pdf->output('laporanbarang.pdf');
    } catch (Exception $e) {
    echo 'Terjadi kesalahan: ' . $e->getMessage();
    }
?>