<?php 
require "../functions.php";

var_dump($_GET);
$keyword = $_GET["keyword"];
$query = "SELECT * FROM baranghilang WHERE 
                namabarang LIKE '%$keyword%'OR
                pemilik LIKE '%$keyword%'OR
                jenisBarang LIKE '%$keyword%'OR
                tempatHilang LIKE '%$keyword%'";
$rows = query($query);

?>
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
            <a href="ubah.php?id=<?=  $row["id_brghilang"]; ?>">Ubah</a>  | 
            <a href="hapus.php?id=<?= $row["id_brghilang"]; ?>" onclick = "return confirm('yakin');">Hapus</a> 
        </td>
        <td><img src="img/<?= $row["gambar"];?>" width="50px" height="50px"></td>
        <td><?= $row["namaBarang"];?></td>
        <td><?= $row["tempatHilang"];?></td>
        <td><?= $row["pemilik"] ;?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach ?>
</table>