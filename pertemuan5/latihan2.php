<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
//Cek apakah tidak ada data di $_GET
if (!isset($_GET["namabarang"])||
    !isset($_GET["tempatPenemuan"])||
    !isset($_GET["penemu"])||
    !isset($_GET["jenisBarang"])) {
    //redirect
    header("Location:latihan1.php");
    exit;
}

?>
    <ul>
        <li><img src="../pertemuan4/img/<?= $_GET["namabarang"]?>.jpg"></li>
        <li><?= $_GET["namabarang"];?></li>
        <li><?= $_GET["tempatPenemuan"];?></li>
        <li><?= $_GET["penemu"];?></li>
        <li><?= $_GET["jenisBarang"];?></li>
    </ul>
</body>
</html>