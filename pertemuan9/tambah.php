<?php 
//connect to db
$conn = mysqli_connect("localhost","root","","sipencari");

// Memasukkan function.php
require "functions.php";

//cek apakah tombol submit sudah diklik
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo '
            <script> 
                alert("data berhasil ditambahkan")
                document.location.href="index.php";
            </script>
        ';
    }
    else { 
        echo '
            <script> 
                alert("data gagal ditambahkan")
                document.location.href="index.php";
            </script>
        ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
</head>
<body>
    <form action="" method="post">
    <ul>
        <li>
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" id="namaBarang">
        </li>
        <li>
            <label for="tempatPenemuan">Tempat Penemuan</label>
            <input type="text" name="tempatPenemuan" id="tempatPenemuan">
        </li>
        <li>
            <label for="penemu">Penemu</label>
            <input type="text" name="penemu" id="penemu">
        </li>
        <li>
            <label for="jenisBarang">Jenis Barang</label>
            <input type="text" name="jenisBarang" id="jenisBarang">
        </li>
        <li>
            <button type="submit" name="submit">Press</button>
        </li>
    </ul>
    </form>
</body>
</html>