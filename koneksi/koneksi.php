<?php
    $koneksi = mysqli_connect("localhost", "root", "", "beasiswa");
    if(!$koneksi){
        echo "Koneksi ke database gagal : " . mysqli_connect_error();
    }else{
        echo "Koneksi ke database berhasil";
    }
?>