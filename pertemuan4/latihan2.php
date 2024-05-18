<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            display : inlineblock;
            width : 100px;
            height : 100px;
        }
    </style>
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
    <?php foreach($barangHilang as $barang) :?>
        <ul>
            <?php foreach($barang as $key => $value) :?>
                <?php if ($key == "namabarang") : ?>
                    <li> <img src="img/<?= $value?>.jpg"></li>
                <?php endif ?>
                <li><?php echo $key ." : ".$value ?></li>
            <?php endforeach ?>
        </ul>
    <?php endforeach ?>
</body>
</html>