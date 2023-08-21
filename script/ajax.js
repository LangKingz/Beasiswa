document.getElementById("nama").addEventListener("change", function () {
  var idAnggotaValue = this.value; // Mengambil nilai id_anggota dari elemen select
  var ipkField = document.getElementById("ipk");
  var beasiswaField = document.getElementById("beasiswa");
  var fileField = document.getElementById("berkas");

  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var response = JSON.parse(xhr.responseText);
      if (response && response.ipk) {
        ipkField.value = response.ipk;

        // Mengaktifkan/menonaktifkan input beasiswa dan file berdasarkan IPK
        if (parseFloat(response.ipk) < 3) {
          beasiswaField.disabled = true;
          fileField.disabled = true;
        } else {
          beasiswaField.disabled = false;
          fileField.disabled = false;
        }
      } else {
        ipkField.value = "";
      }
    }
  };
  xhr.open("GET", "get_ipk.php?id_anggota=" + encodeURIComponent(idAnggotaValue), true);
  xhr.send();
});
