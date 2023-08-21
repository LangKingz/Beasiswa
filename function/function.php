<?php

function uploud()
{

    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tempName = $_FILES['foto']['tmp_name'];

    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu');
    </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Bukan gambar');
    </script>";
        return false;
    }

    if ($ukuranFile > 150000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar');
    </script>";
        return false;
    }

    $tujuan = '../view/img/' . $namaFile;
    if (move_uploaded_file($tempName, $tujuan)) {
        return $namaFile;
    } else {
        echo "<script>
        alert('Gagal mengupload gambar');
    </script>";
        return false;
    }
}

function tambah($data)
{
    global $koneksi;
    // htmlspecialchars untuk menghindari serangan xss

    $nama = htmlspecialchars($data["id_anggota"]);
    $email = htmlspecialchars($data["email"]);
    $nomor = htmlspecialchars($data["nomor"]);
    $semester = htmlspecialchars($data["semester"]);
    $beasiswa = htmlspecialchars($data["jenis_beasiswa"]);
    $berkas = uploud();

    $query = "INSERT INTO daftar VALUES ('  ','$nama','$email','$nomor','$semester','$beasiswa','$berkas')";
    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
