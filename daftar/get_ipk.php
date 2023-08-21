<?php
// Mengimpor file koneksi yang mengatur koneksi ke database
require '../koneksi/koneksi.php';

// Memeriksa apakah parameter 'nama' telah diterima melalui metode GET
if (isset($_GET['id_anggota'])) {
    // Mengamankan nilai 'nama' dari potensi serangan SQL injection
    $id_anggota = mysqli_real_escape_string($koneksi, $_GET['id_anggota']);

    // Membuat kueri SQL untuk mengambil data IPK dari tabel anggota berdasarkan nama
    $sql = "SELECT ipk FROM anggota WHERE id_anggota = '$id_anggota'";

    // Menjalankan kueri SQL dan mengambil hasilnya
    $result = $koneksi->query($sql);

    // Memeriksa apakah ada baris hasil yang ditemukan
    if ($result->num_rows > 0) {
        // Mengambil data IPK dari baris hasil
        $row = $result->fetch_assoc();
        $ipk = $row["ipk"];

        // Mengirim data IPK sebagai respons JSON
        echo json_encode(array("ipk" => $ipk));
    } else {
        // Jika tidak ada data ditemukan, mengirimkan respons JSON dengan IPK kosong
        echo json_encode(array("ipk" => ""));
    }
}
