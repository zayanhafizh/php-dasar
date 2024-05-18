<?php 
//Standar output
//print,echo
//print_r -> untuk print arrar
//var_dump -> print variabel
//print_r dan var_dump untuk debugging
    // echo "Hello World";
    // print_r("Hello World");
    // var_dump("Hello World"); //hasilnya ada tipe data dan panjang variabel 
    // echo true; //1
    // echo false; // kosong
//yang tampil di user html

//Penulisan sintaks PHP
/*
1. PHP di dalam html
2. html di dalam php
*/  

//Variabel dan tipe data 
// Variabel
/*
    aturannya sama kaya JS
*/ 
$nama = "zayan";
$nama_depan = "Zayan";
$nama_belakang ="Hadaya";

//Concatenate string / penggabungan string
echo $nama_depan.$nama_belakang; //asal gabung
echo $nama_depan." ".$nama_belakang; //kasih spasi

//Interpolasi saat menggunakan ""
echo "Halo nama saya $nama"; //print isi variabel
echo 'Halo nama saya $nama';  //print $nama

//Operatornya sama aja kaya JS
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Contoh php didalam html -->
    <h1>Halo selamat datang <?php echo 'Zayan' ?></h1> 
    <!-- Contoh penggunaan variabel -->
    <h1>Halo selamat datang <?php echo $nama ?></h1> 
    <p><?php echo 'Ini paragraf' ?></p>
    <?php 
    // Contoh html di dalam php
        echo "<h1>Halo selamat datang</h1>"; 
    ?>
</body>
</html>
