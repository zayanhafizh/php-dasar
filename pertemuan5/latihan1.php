<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <?php 
    $barangHilang = [
        [
            "namabarang" =>"handphone",
            "tempatPenemuan" => "321",
            "penemu" => "Aku",
            "jenisBarang" => "Elektronik"
        ],
        [
            "namabarang" =>"kacamata",
            "tempatPenemuan" => "Maskam",
            "penemu" => "Ada deh",
            "jenisBarang" => "Aksesoris"
        ],
        [
            "namabarang" =>"gantungan kunci",
            "tempatPenemuan" => "321",
            "penemu" => "Aku",
            "jenisBarang" => "Aksesoris"
        ],
        [
            "namabarang" =>"tws",
            "tempatPenemuan" => "251",
            "penemu" => "Dia",
            "jenisBarang" => "Elektronik"
        ],
        [
            "namabarang" =>"pulpen",
            "tempatPenemuan" => "263",
            "penemu" => "Kamu",
            "jenisBarang" => "Alat Tulis"
        ]
    ]
    ?>
    <h3>Barang Hilang</h3>
    <ul>
        <?php foreach ($barangHilang as $barang) :?>
            <li>
                <a href="latihan2.php?namabarang=<?= $barang["namabarang"];?>&
                tempatPenemuan=<?= $barang["tempatPenemuan"];?>&
                penemu=<?= $barang["penemu"];?>&
                jenisBarang=<?= $barang["jenisBarang"];?>">
                    <?= $barang["namabarang"] ?>
                <!-- Ketika pindah halaman sekalian mengirim request method get 
                kemudian disimpan di variavel $_GET -->
                </a>
        <?php endforeach ?>
    </ul>
</body>
</html>