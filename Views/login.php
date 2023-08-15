<?php
// MEMASUKKAN FILE FUNCTION.PHP
require '../Model/function.php' ;
session_start() ;

if ( isset($_SESSION["login"]) ) {
  session_destroy() ;
  session_unset() ;
  $_SESSION = [] ;
  header("Location: ./home.php") ;
}

$display = "neutral";
$database = new FromToDatabase('login') ;

if (isset($_POST["submit"])) {
    $result = $database->getUser($_POST["email"]) ;
    if ($result != 0) {
        if ($_POST["password"] == $result["password"]) {
            $_SESSION['login'] = true ;
            header('Location: ./home.php') ;
        } 
    }
    else {
        $display = 'red' ;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login BPSDMP</title>
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
      <a href="./home.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up">
        Home
      </a>
      <a href="./about.php" class="border border-neutral-300 p-2 px-4 rounded" data-aos="fade-up" data-aos-delay="800">
        About
      </a>
      <a href="./login.php" class="border border-neutral-300 p-2 px-4 rounded bg-blue-300/30 shadow-lg" data-aos="fade-up" data-aos-delay="500">
        Login
      </a>
    </div>
  </div>

  <!-- MAIN BODY FOR CONTENT -->
  <div class="w-full min-h-screen flex flex-col items-center mt-10">
    <div class="w-[90%] lg:w-[50%] " id="mainContent">
      <form action="" method="POST" class="w-full flex flex-col" id="formLogin">
        <div class="w-full flex flex-col my-3" data-aos="fade-up" data-aos-delay="">
            <label for="email" class="text-<?php echo $display ?>-500">Username *</label>
            <input type="text" id="email" name="email" class="outline-none rounded border border-<?php echo $display ?>-600 px-3 py-1 focus:border-blue-600">
        </div>
        <div class="w-full flex flex-col mb-4" data-aos="fade-up" data-aos-delay="500">
            <label for="password" class="text-<?php echo $display ?>-500">Password *</label>
            <input type="password" id="password" name="password" class="outline-none rounded border border-<?php echo $display ?>-600 px-3 py-1 focus:border-blue-600">
        </div>
        <input type="submit" value="Login" name="submit" class="w-full p-3 border border-<?php echo $display ?>-600" data-aos="fade-up" data-aos-delay="1000">
      </form>
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
  <script src="../Controller/login.js"></script>
</body>

</html>