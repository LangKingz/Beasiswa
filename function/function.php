<?php

function uploud()
{
    // Mendapatkan informasi terkait file yang diupload
    $namaFile = $_FILES['foto']['name']; // Nama asli file yang diupload
    $ukuranFile = $_FILES['foto']['size']; // Ukuran file dalam byte
    $error = $_FILES['foto']['error']; // Kode error (jika ada)
    $tempName = $_FILES['foto']['tmp_name']; // Nama sementara file pada server

    // Memeriksa apakah ada error saat upload
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu');
    </script>";
        return false; // Menghentikan eksekusi fungsi
    }

    // Definisi ekstensi gambar yang diizinkan
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

    // Mendapatkan ekstensi dari nama file yang diupload
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    // Memeriksa apakah ekstensi gambar valid
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('Bukan gambar');
    </script>";
        return false;
    }

    // Memeriksa ukuran file
    if ($ukuranFile > 150000000) {
        echo "<script>
        alert('Ukuran gambar terlalu besar');
    </script>";
        return false;
    }

    // Menentukan lokasi tujuan penyimpanan gambar
    $tujuan = '../view/img/' . $namaFile;

    // Memindahkan file yang diupload ke lokasi tujuan
    if (move_uploaded_file($tempName, $tujuan)) {
        return $namaFile; // Mengembalikan nama file yang diupload
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
