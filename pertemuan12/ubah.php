<?php 
//connect to db
$conn = mysqli_connect("localhost","root","","sipencari");

// Memasukkan function.php
require "functions.php";
 
// Ambil dara id dari url
$id = $_GET["id"];

// Query data mahasiswa
$barangHilang = query("SELECT * FROM baranghilang WHERE id =$id")[0];


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
    <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="gambarLama" value="<?= $barangHilang["gambar"]  ?>">
    <ul>
        <li>
            <label for="namaBarang">Nama Barang</label>
            <input type="text" name="namaBarang" id="namaBarang" value="<?= $barangHilang["namaBarang"]  ?>">
        </li>
        <li>
            <label for="tempatPenemuan">Tempat Penemuan</label>
            <input type="text" name="tempatPenemuan" id="tempatPenemuan" value="<?= $barangHilang["tempatPenemuan"]  ?>">
        </li>
        <li>
            <label for="penemu">Penemu</label>
            <input type="text" name="penemu" id="penemu" value="<?= $barangHilang["penemu"]  ?>">
        </li>
        <li>
            <label for="jenisBarang">Jenis Barang</label>
            <input type="text" name="jenisBarang" id="jenisBarang" value="<?= $barangHilang["jenisBarang"]  ?>">
        </li>
        <li>
            <label for="gambar">Jenis Barang</label>
            <img src="img/<?= $barangHilang["gambar"] ?>" alt="">
            <input type="file" name="gambar" id="gambar">
        </li>
        <li>
            <button type="submit" name="submit">Press</button>
        </li>
    </ul>
    </form>
</body>
</html>