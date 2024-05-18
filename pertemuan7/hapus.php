<?php 
$id = $_GET["id"]; 

var_dump($id);
require 'functions.php';
if ( hapus($id) > 0 ) {
    echo '
        <script> 
            alert("data berhasil ditambahkan");
            document.href="index.php";
        </script>
    ';
}
else { 
    echo '
        <script> 
            alert("data gagal ditambahkan");
            document.href="index.php";
        </script>
    ';
}
