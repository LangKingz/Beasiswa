# Pendaftaran Beasiswa - README

Repository ini berisi kode untuk formulir pendaftaran beasiswa yang ditulis dalam bahasa pemrograman PHP. Pemohon dapat mengirimkan informasi mereka dan mendaftar beasiswa berdasarkan semester dan IPK mereka. Tergantung pada IPK mereka, mereka mungkin memenuhi syarat untuk berbagai jenis beasiswa. Formulir juga mencakup opsi unggah berkas untuk dokumen yang diperlukan.

## Memulai

Untuk menjalankan formulir pendaftaran beasiswa di lingkungan lokal Anda, ikuti langkah-langkah berikut:

1. **Kloning Repositori:**
   ```
   git clone <repository-url>
   cd scholarship-application
   ```

2. **Konfigurasi Basis Data (jika diperlukan):**
   Jika formulir memerlukan interaksi basis data untuk menyimpan atau mengambil data, pastikan Anda memiliki basis data yang kompatibel (misalnya, MySQL) yang diatur dan dikonfigurasi dengan kredensial yang diperlukan. Perbarui pengaturan koneksi basis data dalam file-file yang sesuai.

3. **Konfigurasi Lingkungan:**
   Konfigurasikan server web Anda (misalnya, Apache) untuk melayani aplikasi dari direktori yang telah Anda klona.

4. **Ketergantungan:**
   Kode ini tampaknya mencakup gaya CSS dan skrip JavaScript. Pastikan untuk meletakkan file-file ini di jalur yang benar relatif terhadap file HTML Anda.

5. **Akses Formulir:**
   Setelah lingkungan Anda diatur dan server web berjalan, Anda dapat mengakses formulir pendaftaran beasiswa dengan mengunjungi URL yang sesuai di peramban web Anda.

## Penggunaan

1. **Pengiriman Formulir:**
   Isi informasi yang diperlukan di bidang formulir, termasuk nama, email, nomor telepon, semester saat ini, dan unggah dokumen yang diperlukan. Bergantung pada IPK saat ini, beberapa bidang mungkin dinonaktifkan.

2. **Perhitungan IPK:**
   Nilai IPK yang ditampilkan kemungkinan diambil dari basis data atau dihitung menggunakan data yang disediakan.

3. **Memilih Beasiswa:**
   Jika IPK Anda kurang dari atau sama dengan 3, opsi dropdown "Pilihan Beasiswa" akan dinonaktifkan, dan Anda tidak dapat memilih jenis beasiswa.

4. **Mengunggah Dokumen:**
   Lampirkan berkas yang diperlukan (PDF, JPG, JPEG, atau ZIP) untuk mendukung aplikasi Anda.

5. **Pengiriman:**
   Klik tombol "Daftar" untuk mengirimkan aplikasi beasiswa Anda.

## Penjelasan Kode

- Skrip PHP di awal kode (`<?php require_once 'component/DataIPK.php'; ?>`) mungkin mencakup fungsionalitas untuk mengambil atau menghitung IPK.
- Formulir dibuat dengan berbagai bidang input untuk mengumpulkan data pemohon.
- Logika terkait IPK menonaktifkan beberapa bidang dan dropdown berdasarkan nilai IPK.
- JavaScript disertakan (`<script src="script.js"></script>`) untuk validasi sisi klien atau perilaku dinamis potensial.

## Berkontribusi

Kontribusi terhadap proyek formulir pendaftaran beasiswa ini sangat diterima! Jika Anda menemukan masalah atau perbaikan, silakan buat permintaan pull atau ajukan isu di repositori.


---

