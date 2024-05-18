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
