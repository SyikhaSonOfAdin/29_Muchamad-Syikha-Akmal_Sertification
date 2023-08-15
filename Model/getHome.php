<?php
// MENGAKSES FILE FUNCTION.PHP
require 'function.php' ;

// DEKLARASI VARIABEL YANG DIPERLUKAN
$i = 0 ;

if (isset($_POST["gettingDashboard"])) {
    // MEMBUAT OBJEK DATABASE DENGAN INSTANCE DARI CLASS FromToDatabase
    $database = new FromToDatabase('content') ;

    // MENGGUNAKAN METHOD GETTABLE DARI OBJEK DATABASE UNTUK MENGAMBIL DATA DARI TABLE TERTENTU
    $result = $database->getTable() ;

    // MEMBUAT VARIABEL DENGAN VALUE SEPERTI BERIKUT GUNA RESPONSE DARI REQUEST
    $response = '' ;
      
    // MERAKIT DAN MENYUSUN DATA DARI VARIABEL RESULT MENJADI BENTUK HTML
    while ($data = mysqli_fetch_assoc($result)) {
        if ($i == 0) {
            $response .= '<a href="blog.php?id=' . $data["id"] . '" class="w-full flex flex-col" data-aos="fade-up" data-aos-delay="1000">
            <img src="../Uploads/' . $data["image_name"] . '" alt="" class="rounded-sm border border-neutral-300 shadow-xl">
            <h1 class="text-gray-900 uppercase font-bold md:text-xl lg:text-xl" data-aos="fade-up" data-aos-delay="1100">
              ' . $data["headline"] . '
            </h1>
          </a>
          <div class="w-full py-6 mt-6 border-t border-t-neutral-300 justify-between flex flex-wrap" data-aos="fade-up" data-aos-delay="1500">' ;
        } else {
            $response .= '<a href="blog.php?id=' . $data["id"] . '" class="w-[48%] flex flex-col" data-aos="fade-up" data-aos-delay="500">
            <img src="../Uploads/' . $data["image_name"] . '" alt="" class="rounded-sm border border-neutral-300">
            <h1 class="text-gray-900 uppercase font-bold md:text-md" >
              ' . $data["headline"] . '
            </h1>
          </a>' ;
        }
        $i++ ;
    }

    $response .= '</div>' ;

    //  MENGEMBALIKAN RESPONSE BERUPA BENTUK HTML
    echo $response ;
} 