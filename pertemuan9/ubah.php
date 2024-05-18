<?php 
//connect to db
$conn = mysqli_connect("localhost","root","","sipencari");

// Memasukkan function.php
require "functions.php";
 
// Ambil dara id dari url
$id = $_GET["id"];

// Query data mahasiswa
$mhs = query("SELECT * FROM baranghilang WHERE id =$id")[0];


//cek apakah tombol submit sudah diklik
if (isset($_POST["submit"])) {
    // Cek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo '
            <script> 
                alert("data berhasil diubah")
                document.location.href="index.php";
            </script>
        ';
    }
    else { 
        echo '
            <script> 
                alert("data gagal diubah")
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
    <title>Ubah</title>
</head>
<body>
    <form action="" method="post">
    <input type="hidden" name="id" value="<?= $id ?>">
    <ul>
        <li>
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" id="namaBarang" value="<?= $mhs["namaBarang"]  ?>">
        </li>
        <li>
            <label for="tempatPenemuan">Tempat Penemuan</label>
            <input type="text" name="tempatPenemuan" id="tempatPenemuan" value="<?= $mhs["tempatPenemuan"]  ?>">
        </li>
        <li>
            <label for="penemu">Penemu</label>
            <input type="text" name="penemu" id="penemu" value="<?= $mhs["penemu"]  ?>">
        </li>
        <li>
            <label for="jenisBarang">Jenis Barang</label>
            <input type="text" name="jenisBarang" id="jenisBarang" value="<?= $mhs["jenisBarang"]  ?>">
        </li>
        <li>
            <button type="submit" name="submit">Press</button>
        </li>
    </ul>
    </form>
</body>
</html>