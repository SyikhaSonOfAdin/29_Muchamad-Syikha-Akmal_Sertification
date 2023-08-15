
<?php
session_start() ;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BPSDMP</title>
  <link rel="icon" href="../Assets/logo BPSDMP.png">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,700&family=Days+One&family=Inter:wght@400;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:wght@100;200;300;400;500;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../dist/tailwind-output.css" />
  <link rel="stylesheet" href="../dist/clientHome-style.css" />
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
  <!-- NAVBAR COMPONENT -->
  <div class="w-full border-b border-b-neutral-300 flex items-center justify-center p-3" data-aos="fade-down">
    <div class="w-full md:w-[90%] lg:w-1/2 flex items-center">
      <img src="../Assets/logo BPSDMP.png" alt="" class="w-12 mx-2 md:mr-6 md:w-[75px]" id="logo" />
      <div class="w-1/2">
        <h1 class="text-[8px] text-gray-900 w-1/2 uppercase font-bold md:text-lg lg:text-xl">
          <span>BPSDMP</span>
        </h1>
        <h1 class="text-gray-500 text-[8px] md:text-sm font-semibold">
          Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan
          Informatika Surabaya
        </h1>
      </div>
    </div>
  </div>
  <div class="w-full mt-2 flex items-center justify-center" data-aos="slide-down" data-aos-delay="200">
    <div class="w-full md:w-[90%] lg:w-1/2 font-semibold flex justify-evenly items-center text-sm">
      <a href="./home.php" class="border border-neutral-300 p-2 px-4 rounded"
        data-aos="fade-up">
        Home
      </a>
      <?php if (isset($_SESSION['login'])) : ?>
      <a href="./about.php" class="border border-neutral-300 p-2 px-4 rounded bg-blue-300/30 shadow-lg" data-aos="fade-up" data-aos-delay="800">
        About
      </a>
      <a href="./admin.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="800">
        Admin
      </a>
      <a href="./login.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="500">
        Logout
      </a>
      <?php else : ?>
      <a href="./about.php" class="border border-neutral-300 p-2 px-4 rounded bg-blue-300/30 shadow-lg" data-aos="fade-up" data-aos-delay="800">
        About
      </a>
      <a href="./login.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="500">
        Login
      </a>
      <?php endif; ?>
    </div>

  </div>

  <!-- MAIN BODY FOR CONTENT -->
  <div class="w-full min-h-screen flex flex-col items-center mt-10">
    <div class="w-[90%] lg:w-[50%]" id="mainContent">
      <h1 class="text-2xl font-bold italic" data-aos="fade-up">
        Balai Pengembangan Sumber Daya Manusia dan Penelitian Komunikasi dan Informatika Surabaya Badan Penelitian dan Pengembangan Sumber Daya Manusia - Kementerian Komunikasi dan Informatika Republik Indonesia
      </h1>
      <img src="../Assets/GAMBAR KEGIATAN 1.jpg" alt="" class="my-3 rounded-sm border border-neutral-300 shadow-xl" data-aos="fade-up" data-aos-delay="500">
      <p class="text-justify" data-aos="fade-up" data-aos-delay="1000">
        Badan Pengembangan Sumber Daya Manusia (BPSDMP) semula bernama Badan Pendidikan dan Pelatihan (Diklat) Departemen Perhubungan adalah badan pelaksana tugas bidang pendidikan dan pelatihan sektor Perhubungan dibentuk melalui Surat Keputusan Menteri Perhubungan R.I nomor KM.091/ OT.002/Phb‐80.

        BPSDMP telah beberapa kali diubah, terakhir dengan Keputusan Menteri Perhubungan Nomor KM. 43 perubahan nomenklatur dari Badan Pendidikan dan Pelatihan Perhubungan menjadi Badan Pengembangan Sumber Daya Manusia Perhubungan berdasarkan Peraturan Presiden Nomor 24 Tatahun 2005 JO KM. 47 Tahun 2005 dan KM. 62 tahun 2006 tentang Organisasi dan Tata Kerja Departemen Perhubungan.
        
        BPSDMP dipimpin oleh Kepala Badan yang bertanggung jawab langsung kepada Menteri.  BPSDMP selama ini banyak melakukan kegiatan pendidikan dan pelatihan untuk meningkatkan dan memenuhi kebutuhan sumber daya manusia Perhubungan.
        
        Pada tahun 2010 ada evaluasi tentang Kedudukan, Tugas, dan Fungsi Kementerian Negara serta Susunan Organisasi, Tugas, dan Fungsi Eselon I Kementerian Negara. Untuk menindaklanjuti hal tersebut diterbitkan Peraturan Menteri Perhubungan Nomor: KM 60 Tahun 2010 Tentang Organisasi dan Tata Kerja Kementerian Perhubungan. Sampai saat ini Badan Pengembangan Sumber daya manusia terus bekerja keras untuk mewujudkan sumber daya manusia perhubungan yang handal.
        <br>
        <br>
        Alamat: Jl. Raya Ketajen No.36, Ketajen, Kec. Gedangan, Kabupaten Sidoarjo, Jawa Timur 61254
        <br>
        Telepon: (031) 8011944
        <br>
        Provinsi: Jawa Timur

      </p>
    </div>
  </div>

  <!-- FOOTER COMPONENT -->
  <div class="w-full border-t border-neutral-300 bg-[#134BA2] flex justify-center items-center text-white" id="footer">
    <div class="w-[90%] m-8 flex flex-col lg:w-1/2">
      <div class="mt-5">
        <div class="text-center">
          <p class="text-[8px]">
            ©2023
            <a href="https://balitbangsdm.kominfo.go.id/" target="_blank">Badan Pengembangan Sumber Daya Manusia
              Komunikasi dan
              Informatika</a><br /><a href="https://kominfo.go.id/" target="_blank">Kementerian Komunikasi dan
              Informatika Republik Indonesia</a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="../Controller/blog.js"></script>
</body>

</html>