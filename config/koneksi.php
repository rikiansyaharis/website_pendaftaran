<?php

$conn = mysqli_connect("localhost", "root", "", "akademik");

function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function upload() {
    
}

function tambah($pendaftaran)
{
    global $conn;

    $nama = htmlspecialchars($pendaftaran["nama"]);
    $alamat = htmlspecialchars($pendaftaran["alamat"]);
    $jenisKelamin = htmlspecialchars($pendaftaran["jenisKelamin"]);
    $agama = htmlspecialchars($pendaftaran["agama"]);
    $asalSekolah = htmlspecialchars($pendaftaran["asalSekolah"]);
    $tahunLulus = htmlspecialchars($pendaftaran["tahunLulus"]);


    $query = "INSERT INTO pendaftaran VALUES 
    ('', '$nama', '$alamat', '$jenisKelamin', '$agama', '$asalSekolah', '$tahunLulus')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function update($pendaftaran)
{
    global $conn;

    $id = $pendaftaran["id"];
    $Nama = htmlspecialchars($pendaftaran["Nama"]);
    $Alamat = htmlspecialchars($pendaftaran["Alamat"]);
    $jenisKelamin = htmlspecialchars($pendaftaran["jenisKelamin"]);
    $agama = htmlspecialchars($pendaftaran["agama"]);
    $asalSekolah = htmlspecialchars($pendaftaran["asalSekolah"]);
    $tahunLulus = htmlspecialchars($pendaftaran["tahunLulus"]);

    $query = "UPDATE pendaftaran SET
        Nama = '$Nama',
        Alamat = '$Alamat',
        jenisKelamin = '$jenisKelamin',
        agama = '$agama',
        asalSekolah = '$asalSekolah',
        tahunLulus = '$tahunLulus'
      WHERE id = $id
    ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pendaftaran WHERE id = $id");

    return mysqli_affected_rows($conn);
}


function search($keyword)
{
    $query = "SELECT * FROM pendaftaran WHERE 
    nama  LIKE  '%$keyword%' OR
    tahunLulus LIKE  '%$keyword%' OR
    jenisKelamin LIKE  '%$keyword%' OR
    agama LIKE  '%$keyword%' OR
    asalSekolah LIKE '%$keyword%'
    ";

    return query($query);
}

function register($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek user
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo
        "<script> 
                alert('username sudah ada');
            </script>";
        return false;
    }

    // cek confirm password
    if ($password !== $password2) {
        echo "
            <script>
                alert('konfirmasi password gagal'); 
            </script>";
        return false;
    }

    // enkripsi password
    $pass = md5($password);

    

    // tambah user baru ke db
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$pass')");

    return mysqli_affected_rows($conn);

}



?>
