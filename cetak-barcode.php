<?php
include 'config/app.php';
$view = $db->query('SELECT * FROM barang');
$data = [];
$i = 1;
$d = 0;

while ($row = $view->fetch_array()) {
    if (($i - 1) % 3 == 0) {
        $d++;
    }
    $data[$d][] = $row['barcode'];
    $i++;
}
?>
<table width="100%" align="center" border="1" cellpadding="5" cellspacing="2">
    <?php foreach ($data as $row) : ?>
        <tr>
            <?php foreach ($row as $item) : ?>
                <td>
                    <img alt="<?= $item ?>" src="barcode.php?text=<?= $item ?>&print=true" />
                </td>
            <?php endforeach; ?>

        </tr>
    <?php endforeach; ?>
 </table>

<script>
	window.print();
</script>