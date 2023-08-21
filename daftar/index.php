<?php
session_start();
require '../koneksi/koneksi.php';
require '../function/function.php';

// kondisi dimana tombol submit ditekan
if (isset($_POST["submit"])) {
  // cek apakah data berhasil ditambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = '../View/index.php';
            </script>
        ";
  } else {
    // cek apakah data berhasil ditambahkan atau tidak
    echo "
            <script>
                alert('Data Gagal Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
  }
}

$sql = "SELECT nama, ipk FROM anggota WHERE id_anggota = 1"; // Ganti id sesuai kebutuhan
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  $nama = $row["nama"];
  $ipk = $row["ipk"];
} else {
  echo "Tidak ada data ditemukan.";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../Style/Daftar.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Daftar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
</head>

<body>
  <?php

  include '../component/navbar.php';

  ?>

  <main>
    <div class="container">
      <div class="row">
        <div class="title">
          <h3>Daftar Beasiswa</h3>
        </div>
      </div>
      <div class="row">
        <div class="col d-flex">
          <form action="" enctype="multipart/form-data" method="POST">
            <table>

              <tr class="mb-2">
                <td>Masukkan Nama</td>
                <td class="titik">:</td>
                <td>
                  <!-- Inputan Dropdown Nama -->
                  <select name="id_anggota" id="nama">
                    <option value="">Pilih Nama</option>
                    <?php
                    // Ambil data nama dari tabel
                    $nama_sql = "SELECT * FROM anggota";
                    $nama_result = $koneksi->query($nama_sql);

                    if ($nama_result) {
                      while ($nama_row = $nama_result->fetch_assoc()) {
                        $selected = ($nama === $nama_row['nama']) ? "selected" : "";
                        echo "<option value='{$nama_row['id_anggota']}' $selected>{$nama_row['nama']}</option>";
                      }
                    }
                    ?>
                  </select>

                </td>
              </tr>
              <tr class="">
                <td>Masukkan Email</td>
                <td class="titik">:</td>
                <td><input type="email" name="email" id="nim" required /></td>
              </tr>
              <tr class="">
                <td>Nomor Telepon</td>
                <td class="titik">:</td>
                <td><input type="tel" pattern="[0-9]+" name="nomor" id="nim" required /></td>
              </tr>
              <tr class="">
                <td>Semester</td>
                <td class="titik">:</td>
                <td>
                  <select class="mt-3" id="semester" name="semester" required>
                    <option value="">Pilih Semester</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </td>
              </tr>
              <tr class="">
                <td>IPK</td>
                <td class="titik">:</td>
                <td><input type="tel" name="IPK" id="ipk" value="<?php echo $ipk; ?>" disabled></td>
              </tr>
              <tr class="">
                <td>Pilihan Beasiswa</td>
                <td class="titik">:</td>
                <td>
                  <select name="jenis_beasiswa" id="beasiswa" class="mt-3">
                    <option value="akademik">Beasiswa Akademik</option>
                    <option value="non-akademik">Beasiswa Non Akademik</option>
                  </select>
                </td>
              </tr>
              <tr class="">
                <td>Upload Berkas</td>
                <td class="titik">:</td>
                <td><input type="file" id="file" name="foto" accept=".pdf,.jpg,.jpeg,.zip" /></td>
              </tr>
              <tr class="button">
                <td></td>
                <td></td>
                <td class="d-flex mx-3">
                  <button class="btn-batal">Batal</button>
                  <button class="daftar" type="submit" name="submit">Daftar</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script src="../script/ajax.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>


</html>