<?php

require_once '../component/DataIPK.php';

session_start();
// if(!isset($_SESSION["daftar"])){
//   header("Location: ../index.php");
//   exit;
// }

$data = [
  'nama' => $_POST['nama'],                 // Mengambil data 'nama' dari form menggunakan metode POST
  'email' => $_POST['email'],               // Mengambil data 'email' dari form menggunakan metode POST
  'nomor' => $_POST['nomor'],               // Mengambil data 'nomor' dari form menggunakan metode POST
  'semester' => $_POST['semester'],         // Mengambil data 'semester' dari form menggunakan metode POST
  'ipk' => $ipk,                            // Mengambil data 'ipk' dari require DataIPK.php
  'jenis_beasiswa' => $_POST['jenis_beasiswa'], // Mengambil data 'jenis_beasiswa' dari form menggunakan metode POST
];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/Daftar.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>
  <style>
    span {
      display: inline-block;
      background-color: #EF4565;
      padding: 0 0.5rem;
      color: white;
      border-radius: 0.5rem;
    }

    main {
      height: 700px;
    }

    img{
      width: 200px;
      height: 200px;
      margin-top: 10px;
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>

  <?php

  include '../component/navbarView.php';

  ?>

  <main>
    <div class="container">
      <div class="row">
        <div class="title">
          <h3>Formulir Pendaftaran</h3>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex">
          <form action="" enctype="multipart/form-data" method="POST">
            <table class="">
              <tr class="">
                <td>Masukkan Nama</td>
                <td class="titik">:</td>
                <td><?= $data['nama'] ?></td>
              </tr>
              <tr class="">
                <td>Status</td>
                <td class="titik">:</td>
                <td><span>Belum diverifikasi</span></td>
              </tr>
              <tr class="">
                <td>Masukkan Email</td>
                <td class="titik">:</td>
                <td><?= $data['email'] ?></td>
              </tr>
              <tr class="">
                <td>Nomor Telepon</td>
                <td class="titik">:</td>
                <td><?= $data['nomor'] ?></td>
              </tr>
              <tr class="">
                <td>Semester</td>
                <td class="titik">:</td>
                <td><?= $data['semester'] ?></td>
              </tr>
              <tr class="">
                <td>IPK</td>
                <td class="titik">:</td>
                <td><?= $data['ipk'] ?></td>
              </tr>
              <tr class="">
                <td>Pilihan Beasiswa</td>
                <td class="titik">:</td>
                <td>
                <?= $data['jenis_beasiswa'] ?>
                </td>
              </tr>
              <tr class="">
                <td>Upload Berkas</td>
                <td class="titik">:</td>
                <td>
                <?php
                if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
                  // Mengecek apakah ada file gambar yang diunggah dan tidak ada error
                  $tempFilePath = $_FILES['foto']['tmp_name']; // Path sementara file di server
                  $fileName = $_FILES['foto']['name']; // Nama file
                  $uploadDir = 'img/'; // Direktori tempat penyimpanan file
                  $uploadPath = $uploadDir . $fileName; // Path lengkap file yang diunggah

                  $imageFileType = strtolower(pathinfo($uploadPath, PATHINFO_EXTENSION)); // Mendapatkan tipe file
                  $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif'); // Ekstensi file yang diperbolehkan
                  if (in_array($imageFileType, $allowedExtensions)) {
                    // Mengecek apakah tipe file sesuai dengan yang diperbolehkan
                    if (move_uploaded_file($tempFilePath, $uploadPath)) {
                      echo '<img src="' . $uploadPath . '" alt="Uploaded Image">'; // Menampilkan gambar yang diunggah
                    } else {
                      echo 'Failed to upload the file.'; // Pesan jika gagal mengunggah
                    }
                  } else {
                    echo 'Invalid file format. Allowed formats: JPG, JPEG, PNG, GIF.'; // Pesan jika format tidak sesuai
                  }
                } else {
                  echo 'No file uploaded.'; // Pesan jika tidak ada file yang diunggah
                }
                ?>
                </td>
              </tr>
              <tr class="button">
                <td></td>
                <td></td>
                <td class="d-flex mx-3">
                  <button href="../index.php" class=" btn-batal">Kembali</button>
                  <button onclick="window.print()" class="daftar">Cetak</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>