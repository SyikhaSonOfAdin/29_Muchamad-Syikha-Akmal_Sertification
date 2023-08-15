<?php
// MEMASUKKAN FILE 
require '../Model/function.php';

// MEMULAI SESSION
session_start() ;
if (!isset($_SESSION['login'])) {
  header('Location: ./login.php');
}

// DEKLARASI VARIABEL UNTUK MENAMPUNG PARAMETER DARI METHOD GET
$blogId = $_GET["id"];
$database = new FromToDatabase('content'); // INISIALISASI OBJEK
$imgPath = $database->imgFilePath($blogId) ;
$data = $database->getTable_S($blogId); // MENAMPUNG HASIL OPERASI DALAM VARIABEL DATA

if (isset($_POST["submit"])) {
  $desc = $_POST["desc"];
  $headline = $_POST["headline"];

  // MEMBUAT PERCABANGAN DIMANA KETIKA USER MENGEDIT GAMBAR ATAU TIDAK
  if (isset($_FILES["imageFile"])) {
    $imgName = $database->imgFileHandler('imageFile') ;
    $database->editContentW_img($desc, $headline, $blogId, $imgName) ;
  } else {
    $database->editContent($desc, $headline, $blogId);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,700&family=Days+One&family=Inter:wght@400;700;800;900&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:wght@100;200;300;400;500;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="../dist/tailwind-output.css" />
    <link rel="stylesheet" href="../dist/clientHome-style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
      <a href="./home.php" class="border border-neutral-300 p-2 px-4 rounded bg-blue-300/30 shadow-lg"
        data-aos="fade-up">
        Home
      </a>
      <?php if (isset($_SESSION['login'])) : ?>
      <a href="./about.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="800">
        About
      </a>
      <a href="./admin.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="800">
        Admin
      </a>
      <a href="./login.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="500">
        Logout
      </a>
      <?php else : ?>
      <a href="./about.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="800">
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
      <div class="w-[90%] lg:w-[50%]">

        <!-- FORM FOR EDIT BLOG OR NEWS -->
        <form
          action="" method="post"
          enctype="multipart/form-data"
          class="w-full flex flex-col justify-center items-center"
        >
            <h1 class="uppercase text-lg font-bold text-white w-full">
                <span>
                    Edit Blog
                </span>
            </h1>

          <!-- INPUT FOR HEADLINE -->
          <div class="my-3 w-full">
            <label
              for="default-input"
              class="block mb-2 text-sm font-semibold text-gray-900"
              >Headline <span class="text-red-500">*</span></label
            >
            <input
              type="text"
              id="default-input"
              placeholder="Headline konten anda"
              name="headline"
              class="border border-black outline-none text-gray-900 text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
              value="<?php echo $data["headline"] ?>"
              required
            />
          </div>

          <!-- TEXT AREA INPUT FOR DESCRIPTION -->
          <div class="my-3 w-full">
            <label
              for="message"
              class="block mb-2 text-sm font-semibold text-gray-900"
              >Deskripsi <span class="text-red-500">*</span></label
            >
            <textarea
              id="message"
              rows="4"
              name="desc"
              class="block p-2.5 w-full text-sm text-gray-900 outline-none rounded border border-black focus:ring-blue-500 focus:border-blue-500"
              placeholder="Deskripsi dari konten anda..."
              required
            ><?php echo $data["main_news"] ?></textarea>
          </div>

          <!-- FILE INPUT FOR IMAGE -->
          <div class="my-3 w-full text-sm">
            <label
              for="formFile"
              class="mb-2 inline-block font-semibold text-neutral-700"
            >
              Pilih Gambar!
            </label>
            <input
              class="relative m-0 block w-full min-w-0 flex-auto rounded border border-solid border-black bg-clip-padding px-3 py-[0.32rem] text-base font-normal text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none"
              type="file"
              id="formFile"
              name="imageFile"
            />
          </div>


          <div class="w-full flex flex-col justify-center items-center">
              <h1 class="uppercase text-lg font-bold text-white w-full">
                  <span>
                  Image Preview
                  </span>
              </h1>
              <img src="<?php echo $imgPath ?>" alt="" class="w-[850px] border border-black">
            </div>

          <!-- ACTION BUTTON TO SUBMIT OR RESERT -->
          <div class="w-full flex my-3">
            <input
              type="reset"
              value="Cancel?"
              class="w-1/2 mr-1 text-red-600 font-bold rounded-md p-2 border-2 border-red-600 hover:bg-red-500 hover:text-white transition-all duration-75"
            />
            <input
              type="submit"
              value="Submit!"
              name="submit"
              class="w-1/2 ml-1 text-blue-600 font-bold rounded-md p-2 border-2 border-blue-600 hover:bg-blue-500 hover:text-white transition-all duration-75"
            />
          </div>
        </form>

        
      </div>
    </div>

    <!-- FOOTER COMPONENT -->
    <div
      class="w-full border-t border-black bg-[#134BA2] flex justify-center items-center text-white"
      id="footer"
    >
      <div class="w-[90%] m-8 flex flex-col lg:w-1/2">
        <div class="mt-5">
          <div class="text-center">
            <p class="text-[8px]">
              ©2023
              <a href="https://balitbangsdm.kominfo.go.id/" target="_blank"
                >Badan Pengembangan Sumber Daya Manusia Komunikasi dan
                Informatika</a
              ><br /><a href="https://kominfo.go.id/" target="_blank"
                >Kementerian Komunikasi dan Informatika Republik Indonesia</a
              >
            </p>
          </div>
        </div>
      </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="../Controller/adminDash.js"></script>
  </body>
</html>
