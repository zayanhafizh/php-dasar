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

    // Query insert data
    $query = "INSERT INTO baranghilang VALUES
            ('','$namaBarang','$tempatPenemuan','$penemu','$jenisBarang')";
    mysqli_query($conn,$query);

    //mengembalikan berapa banyak row yang terubah
    return mysqli_affected_rows($conn);
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
