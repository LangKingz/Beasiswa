<?php

require_once 'component/DataIPK.php';

if(isset($_POST['submit'])){
  echo "<script>alert('Data Berhasil Ditambahkan')</script>";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style/styles.css">
  <title>Document</title>
</head>

<body>

  <?php
  include 'component/navbar.php'
  ?>
  <main>
    <h2>Formulir Pendaftaran Beasiswa</h2>
    <form method="post" action="View/view.php" enctype="multipart/form-data">
      <label for="name">Nama:</label>
      <input type="text" id="name" name="nama" required />

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required />

      <label for="phone">Nomor HP:</label>
      <input type="tel" id="phone" pattern="[0-9]+" name="nomor" required />

      <label for="semester">Semester Saat Ini:</label>
      <select id="semester" name="semester" required>
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

      <label for="ipk">IPK:</label>
      <input type="text" id="ipk" name="ipk" value="<?= $ipk ?>" disabled />

      <label for="beasiswa">Pilihan Beasiswa:</label>
      <select name="jenis_beasiswa" id="beasiswa" <?php if ($ipk <= 3) {
                                                    echo "disabled";
                                                  }  ?>>
        <option value="akademik">Beasiswa Akademik</option>
        <option value="non-akademik">Beasiswa Non Akademik</option>
      </select>

      <label for="file">Upload Berkas Syarat:</label>
      <input type="file" id="file" name="foto" accept=".pdf,.jpg,.jpeg,.zip" <?php if($ipk <= 3){
        echo "disabled";
        } ?>/>

      <button type="submit" id="submit-button" name="submit">Daftar</button>
    </form>
  </main>
  <?php
  include 'component/footer.php'
  ?>
  <script src="script.js"></script>
</body>

</html>