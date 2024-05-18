<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

//menghubungkan functions.php ke index.php
require'functions.php';

//menyimpan hasil dari function query
$rows = query("SELECT * FROM baranghilang");

if (isset($_POST["cari"])) {
    $rows = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">logout</a>
    <form action="" method="post">
        <input type="text" name="keyword" id="keyword">
        <button type="submit" name="cari" id="tombolKlik">Cari!</button>
    </form>
    <br>
    <div class="container" id="container">
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
    </div>
    <a href="tambah.php">Tambah data</a>
    <script src="js/script.js"></script>
</body>
</html>