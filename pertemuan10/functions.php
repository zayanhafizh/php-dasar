<?php 
//koneksi ke database
$conn = mysqli_connect("localhost", "root","","sipencari");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows =[];
    while ( $row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
}

function tambah($data) {
    global $conn;
    
    // htmlspecialchars digunakan untuk menghindari penyusupan script dari user
    $namaBarang = htmlspecialchars($data["namaBarang"]); 
    $tempatPenemuan = htmlspecialchars($data["tempatPenemuan"]);
    $penemu = htmlspecialchars($data["penemu"]);
    $jenisBarang = htmlspecialchars($data["jenisBarang"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Query insert data
    $query = "INSERT INTO baranghilang VALUES
            ('','$namaBarang','$gambar','$tempatPenemuan','$penemu','$jenisBarang')";
    mysqli_query($conn,$query);

    //mengembalikan berapa banyak row yang terubah
    return mysqli_affected_rows($conn);
}

function upload() {

    $namaFile = $_FILES["gambar"]["name"];
    $ukuran = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah ada gambar yang di upload
    if ($error === 4 ) {
        echo "<script> 
            alert('Upload Gambar Terlebih Dahulu')
        </script>";
        return false;
    }

    // cek yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile); //memecah nama file yang dipisahkan titik 
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> 
            alert('yang anda upload bukan gambar')
        </script>";
    }

    // cek ukurannya
    if ($ukuran > 1000000) {
        echo "<script> 
            alert('ukuran gambar terlalu besar')
        </script>";
    }

    //generate nama file baru yang unik
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $ekstensiGambar;
    

    // lolos pengecekan gambar kemudian upload 
    move_uploaded_file($tmpName,'img/'.$newFileName);

    return $newFileName;

}

function hapus($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM baranghilang WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    
    // htmlspecialchars digunakan untuk menghindari penyusupan script dari user
    $namaBarang = htmlspecialchars($data["namaBarang"]); 
    $tempatPenemuan = htmlspecialchars($data["tempatPenemuan"]);
    $penemu = htmlspecialchars($data["penemu"]);
    $jenisBarang = htmlspecialchars($data["jenisBarang"]);
    $gambarLama = ($data["gambarLama"]);

    if ($_FILES["gambar"]["error"] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    // Query ubah data
    $query = "UPDATE baranghilang SET 
                namaBarang = '$namaBarang',
                tempatPenemuan = '$tempatPenemuan',
                penemu = '$penemu',
                jenisBarang ='$jenisBarang'
                WHERE id = $id";
    
    mysqli_query($conn,$query);

    //mengembalikan berapa banyak row yang terubah
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM baranghilang WHERE 
                namabarang LIKE '%$keyword%'OR
                penemu LIKE '%$keyword%'OR
                jenisBarang LIKE '%$keyword%'OR
                tempatPenemuan LIKE '%$keyword%'";
    return query($query);
}
