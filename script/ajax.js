document.getElementById("nama").addEventListener("change", function () {
  var idAnggotaValue = this.value; // Mengambil nilai id_anggota dari elemen select
  var ipkField = document.getElementById("ipk"); // Mendapatkan elemen input IPK
  var beasiswaField = document.getElementById("beasiswa"); // Mendapatkan elemen input beasiswa
  var fileField = document.getElementById("berkas"); // Mendapatkan elemen input file

  var xhr = new XMLHttpRequest(); // Membuat objek XMLHttpRequest
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Ketika permintaan Ajax selesai dan status OK (200)
      var response = JSON.parse(xhr.responseText); // Mendapatkan respons JSON dari server
      if (response && response.ipk) {
        // Jika respons memiliki properti 'ipk'
        ipkField.value = response.ipk; // Mengisi nilai input IPK dengan nilai IPK dari respons

        // Mengaktifkan/menonaktifkan input beasiswa dan file berdasarkan IPK
        if (parseFloat(response.ipk) < 3) {
          beasiswaField.disabled = true; // Menonaktifkan input beasiswa
          fileField.disabled = true; // Menonaktifkan input file
        } else {
          beasiswaField.disabled = false; // Mengaktifkan input beasiswa
          fileField.disabled = false; // Mengaktifkan input file
        }
      } else {
        ipkField.value = ""; // Jika tidak ada IPK dalam respons, mengosongkan input IPK
      }
    }
  };

  // Membuat permintaan Ajax ke get_ipk.php dengan mengirimkan nilai id_anggota sebagai parameter
  xhr.open("GET", "get_ipk.php?id_anggota=" + encodeURIComponent(idAnggotaValue), true);
  xhr.send(); // Mengirim permintaan
});
