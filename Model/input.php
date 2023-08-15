<?php
require 'function.php';

if (isset($_FILES["imageFile"]) && isset($_POST["desc"]) && isset($_POST["headline"])) {

    // MENAMPUNG SEMUA DATA DARI VARIABEL POST MENJADI VARIABEL YANG TERPISAH
    $desc = $_POST["desc"] ;
    $headline = $_POST["headline"] ;

    // MEMBUAT OBJECT DENGAN MELAKUKAN INSTANCE KEPADA CLASS FromToDatabase
    $toDb = new FromToDatabase('content') ;

    // MENGGUNAKAN METHOD PENANGANAN FILE GAMBAR YANG MENGEMBALIKAN NILAI NAMA FILE 
    $imgName = $toDb->imgFileHandler('imageFile') ;
    
    // MENGGUNAKAN METHOD NEWCONTENT DARI OBJEK YANG TELAH DIBUAT
    $toDb->newContent($desc, $headline, $imgName) ;

    // JIKA PROSES SUDAH SELESAI REDIRECT USER KE HALAMAN DASHBOARD ADMIN
    header('Location: ../Views/admin.php') ;
} 