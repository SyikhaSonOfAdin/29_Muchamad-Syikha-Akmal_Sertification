<?php
// MENGAKSES FILE FUNCTION.PHP
require 'function.php' ;

// DEKLARASI VARIABEL YANG DIPERLUKAN
$i = 1 ;

if (isset($_POST["gettingDashboard"])) {
    // MEMBUAT OBJEK DATABASE DENGAN INSTANCE DARI CLASS FromToDatabase
    $database = new FromToDatabase('content') ;

    // MENGGUNAKAN METHOD GETTABLE DARI OBJEK DATABASE UNTUK MENGAMBIL DATA DARI TABLE TERTENTU
    $result = $database->getTable() ;

    // MEMBUAT VARIABEL DENGAN VALUE SEPERTI BERIKUT GUNA RESPONSE DARI REQUEST
    $response = '<table class="w-full text-sm text-left text-gray-500">
    <thead class="text-xs text-gray-100 uppercase bg-[#00458E]">
      <tr class="border-b border-b-gray-500">
        <th class="px-6 py-3"><span>No</span></th>
        <th class="px-6 py-3"><span>Headline</span></th>
        <th class="px-6 py-3"><span>Action</span></th>
      </tr>
    </thead>
    <tbody>' ;
      
    // MERAKIT DAN MENYUSUN DATA DARI VARIABEL RESULT MENJADI BENTUK HTML
    while ($data = mysqli_fetch_assoc($result)) {
        $response .= '<tr class="bg-white border-b border-b-gray-500 hover:bg-gray-100">
        <td class="px-6 py-4">
          <span class="font-bold text-red-300">' . $i++ . '</span>
        </td>
        <td class="px-6 py-4">' . $data["headline"] . '</td>
        <td class="px-6 py-4">
          <div class="flex">
            <a href="edit.php?id=' . $data["id"] . '"class="bg-blue-500 mx-1 flex justify-center items-center p-1 rounded hover:scale-105 transition-all duration-75">
              <img src="../Assets/edit-button-svgrepo-com.svg" class="w-5" alt="">
            </a>
            <a href="../Model/delete.php?id=' . $data["id"] . '"class="bg-red-500 mx-1 flex justify-center items-center p-1 rounded hover:scale-105 transition-all duration-75">
              <img src="../Assets/delete-svgrepo-com.svg" class="w-5" alt="">
            </a>
          </div>
        </td>
      </tr>' ;
    }

    $response .= '</tbody>
    </table>' ;

    //  MENGEMBALIKAN RESPONSE BERUPA BENTUK HTML
    echo $response ;
} 