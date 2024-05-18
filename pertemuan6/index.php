<?php 
//menghubungkan functions.php ke index.php
require'functions.php';

//menyimpan hasil dari function query
$rows = query("SELECT * FROM baranghilang");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>id</th>
            <th>Aksi</th>
            <th>Barang</th>
            <th>Nama Barang</th>
            <th>Tempat Penemuan</th>
            <th>Nama Penemu</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach( $rows as $row) :?>
        <tr>
            <td><?= $i ?></td>
            <td>
                <a href="#">Ubah</a> | <a href="#">Hapus</a> 
            </td>
            <td><img src="img/<?= $row["namaBarang"];?>.jpg" width="50px" height="50px"></td>
            <td><?= $row["namaBarang"];?></td>
            <td><?= $row["tempatPenemuan"];?></td>
            <td><?= $row["penemu"] ;?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </table>
</body>
</html>