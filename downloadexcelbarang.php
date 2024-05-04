<?php
 
 session_start();
 //membatasi halaman sebelum login
 if(!isset($_SESSION['login'])){
   echo"<script>
       alert('silakan login terlebih dahulu');
       document.location.href = 'login.php';
       </script>";
   exit;
 }

 //membatasi halaman sesuai user login
 if($_SESSION['level']!= 1 and $_SESSION['level']!=3){
  echo"<script>
      alert('Anda harus masuk sebagai admin barang');
      document.location.href = 'login.php';
      </script>";
  exit;
}

require 'config/app.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet->setCellValue('A2', 'No');
$activeWorksheet->setCellValue('B2', 'ID Barang');
$activeWorksheet->setCellValue('C2', 'Nama Barang');
$activeWorksheet->setCellValue('D2', 'Jumlah Barang');
$activeWorksheet->setCellValue('E2', 'Harga Barang');
$activeWorksheet->setCellValue('F2', 'Tanggal');

$data_barang = select("SELECT * FROM barang");

$no = 1;
$start = 3;

foreach($data_barang as $barang){
    $activeWorksheet->setCellValue('A' . $start, $no++)->getColumnDimension('A')->setAutoSize(true);
    $activeWorksheet->setCellValue('B' . $start, $barang['idbarang'])->getColumnDimension('B')->setAutoSize(true);
    $activeWorksheet->setCellValue('C' . $start, $barang['namabarang'])->getColumnDimension('C')->setAutoSize(true);
    $activeWorksheet->setCellValue('D' . $start, $barang['jumlah'])->getColumnDimension('D')->setAutoSize(true);
    $activeWorksheet->setCellValue('E' . $start, $barang['harga'])->getColumnDimension('E')->setAutoSize(true);
    $activeWorksheet->setCellValue('F' . $start, $barang['tanggal'])->getColumnDimension('F')->setAutoSize(true);

    $start++;
}

//border excel
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
    ],
];

$border = $start -1;
$activeWorksheet->getStyle('A2:G' . $border)->applyFromArray($styleArray);

$writer = new Xlsx($spreadsheet);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('Laporan Data barang.xlsx');
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheet.sheet');
header('Content-Disposition: attachment; filename="Laporan Data barang.xlsx"');
readfile('Laporan Data barang.xlsx');
unlink('Laporan Data barang.xlsx');
exit;

?>

