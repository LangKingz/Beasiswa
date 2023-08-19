<?php
require_once '../component/DataIPK.php';



$data = [
  'nama' => $_POST['nama'],                 // Mengambil data 'nama' dari form menggunakan metode POST
  'email' => $_POST['email'],               // Mengambil data 'email' dari form menggunakan metode POST
  'nomor' => $_POST['nomor'],               // Mengambil data 'nomor' dari form menggunakan metode POST
  'semester' => $_POST['semester'],         // Mengambil data 'semester' dari form menggunakan metode POST
  'ipk' => $ipk,                            // Mengambil data 'ipk' dari require DataIPK.php
  'jenis_beasiswa' => $_POST['jenis_beasiswa'], // Mengambil data 'jenis_beasiswa' dari form menggunakan metode POST
];

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../Style/styles.css">
  <title>Hasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <?php
  include '../component/navbarView.php'
  ?>
  <div class="container mb-3 ">
    <div class="card">
      <div class="row ms-4">
        <div class="title p-3 m-3 d-flex justify-content-center ">
          <h2>Formulir Pendaftaran Beasiswa</h2>
        </div>
        <div class="content">
          <table>
            <tr>
              <td>Nama</td>
              <td> : </td>
              <td class="spasi"><?= $data['nama'] ?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td> : </td>
              <td class="spasi">
                <p class="status">Belum Diverifikasi</p>
              </td>
            </tr>
            <tr>
              <td>Email</td>
              <td> :</td>
              <td class="spasi"><?= $data['email'] ?></td>
            </tr>
            <tr>
              <td>Nomor HP</td>
              <td> :</td>
              <td class="spasi"><?= $data['nomor'] ?></td>
            </tr>
            <tr>
              <td>Semester</td>
              <td> :</td>
              <td class="spasi"><?= $data['semester'] ?></td>
            </tr>
            <tr>
              <td>IPK</td>
              <td> :</td>
              <td class="spasi"><?= $data['ipk'] ?></td>
            </tr>
            <tr>
              <td>Jenis Beasiswa</td>
              <td> :</td>
              <td class="spasi"><?= $data['jenis_beasiswa'] ?></td>
            </tr>
            <tr>
              <td>Dokumen</td>
              <td> :</td>
              <td class="spasi">
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
            <tr>
              <td class="d-flex ">
                <a href="../index.php" class="btn-success btn me-2">Kembali</a>
                <button class=" btn btn-primary" onclick="window.print()">cetak</button>
              </td>

            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <?php
  include '../component/footer.php'
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>