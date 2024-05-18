<?php 
//koneksi ke database    
$conn = mysqli_connect("localhost", "root","","sipencari"); //(nama localhost,usernamedbms,pwsdbms,namadb)

//ambil data dari table di database
$result = mysqli_query($conn,"SELECT * FROM baranghilang");//(string koneksi ke db, string query
//saat query berhasil query dijalankan dan mengembalikan nilai true kl salah sebaliknya
// var_dump($result);

//ambil data (fetch) baranghilang dari object result
// mysqli_fetch_row($result); return row pertama dalam bentuk array numerik dari tabel
// mysqli_fetch_assoc($result); return row pertama dalam bentuk array asosiasi dari tabel
// mysqli_fetch_array($result); return row pertama dalam bentuk array numerik dan asosiasi dari tabel
// mysqli_fetch_object($result); return row pertama dalam bentuk objek dari tabel


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
        <?php while( $row = mysqli_fetch_assoc($result) ) :?>
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
        <?php endwhile ?>
    </table>
</body>
</html>