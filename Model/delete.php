<?php 
// MEMASUKKAN FILE
require './function.php' ;

// DEKLARASI VARIABEL YANG DIPERLUKAN 
$database = new FromToDatabase('content') ;
$blogId = $_GET["id"] ;

// MENGAMBIL METHOD HAPUS BLOG YANG MENGEMBALIKAN NILAI REDIRECT KE ADMIN PAGE
$database->deleteBlog($blogId) ;


