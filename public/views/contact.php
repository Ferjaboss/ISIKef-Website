<?php
session_start();
if (isset($_POST['submit'])) {
    // Get form data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $msg = $_POST['msg'];
    $datetime = date('Y-m-d H:i:s'); // current date and time
    
    // connect to the database
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "isik";

    // create connection
    $conn = mysqli_connect($servername, $username, $db_password, $dbname);

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Check if user is logged in and get user ID
    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
    }
    else {
        $user_id = NULL;
    }
    
    // Insert form data into database
    $sql = "INSERT INTO contactus (msgr_nom, msgr_prenom, msgr_email, msgr_sujet, msgr_msg, msgr_datetime, user_id) 
            VALUES ('$nom', '$prenom', '$email', '$sujet', '$msg', '$datetime', '$user_id')";
    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/isik?message=Ton message a été envoyé.");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/output.css">
    <link rel="stylesheet" href="../fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.png">
    <title>Institut Supérieur de l'Informatique du Kef</title>
</head>
<body>
<!-- Barre de navigation -->

<nav class="px-2 bg-white border-gray-200 sm:px-0 py-8">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="../../index.php" class="flex items-center">
        <img src="../img\logos\isik\banner.png" class=" h-16 mr-3 sm:max-h-20" alt="isi kef logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap "></span>
    </a>
    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-multi-level" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">

        <li>
          <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Notre Institut <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
          <!-- Dropdown menu 0 -->
          <div  class="dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
              <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Présentation</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Mot du Directeur</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Galerie</a>
                </li>
              </ul>
          </div>
      </li>
      <li>
        <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Nos formations <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
        <!-- Dropdown menu 1 -->
        <div  class="dropdown-menu hidden absolute  font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
            <ul class="py-2 text-sm text-gray-700 bottom-7" aria-labelledby="dropdownLargeButton">
              <li aria-labelledby="dropdownNavbarLink">
                <button data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Licence<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                <div  class="subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 left-full top-0">
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="doubleDropdownButton">
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">LCS</a>
                      </li>
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">LCE</a>
                      </li>

                    </ul>
                </div>
              </li>
              <li aria-labelledby="dropdownNavbarLink" >
                <button  data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class=" subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Mastère
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                  <div class="relative">
                    <div class="subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                      <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">SIW</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">ASRI</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">AWI</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">NTICDIA</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  
              </li>
            </ul>
        </div>
    </li>
    <li>
      <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">La vie de l'Institut <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
      <!-- Dropdown menu 0 -->
      <div  class="dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
          <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Les Clubs</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Centre 4C </a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Projet Erasmus+</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Bibliothèque</a>
            </li>
          </ul>
      </div>
  </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Actualités et Evénements</a>
        </li>
        <li>
          <a href="/" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Nous Contacter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    


<main class="bg-gray-200">

  <div class="pt-8  mx-36">       
    <a href="../../index.php">Home</a>
    <i class="fa-light fa-greater-than" style="color: #000000;"></i>
    <a href="">Nous Contacter</a>
  </div>
    <div class=" grid grid-cols-3">
              <div class="col-span-2 mx-10 mt-10">
                  <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 ">Nous Contacter</h2>
                  <p class="mb-8 lg:mb-16 font-light text-center text-gray-500  sm:text-xl">Veuillez remplir le formulaire ci-dessous pour nous envoyer un message.</p>
                  <form action="" method="post" class="space-y-8">
                      <div class="grid grid-cols-2 ">
                         <div class="px-4"> 
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Ton nom</label>
                          <input type="text" id="nom" name="nom" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 " placeholder="Nom" required>
                        </div>
                        <div class="px-4"> 
                          <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Ton prenom</label>
                          <input type="text" id="prenom" name="prenom" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 " placeholder="Prénom" required>
                        </div>
                      </div>
                      <div>
                          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Ton email</label>
                          <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 " placeholder="email@email.com" required>
                      </div>
                      <div>
                          <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 ">Sujet</label>
                          <input type="text" id="subject" name="sujet" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 " placeholder="Dites-nous comment nous pouvons vous aider" required>
                      </div>
                      <div class="sm:col-span-2">
                          <label for="message" class="block mb-2 text-sm font-medium text-gray-900 ">Ton message</label>
                          <textarea id="message" name="msg" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 " placeholder="Laissez un commentaire..."></textarea>
                      </div>
                      <button type="submit" name="submit"class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 bg-gray-900">Send message</button>
                  </form>
              </div>
              <div class="">
                <div class="flex justify-center items-center h-1/3 ">
                    <i class="fa-solid fa-phone fa-beat fa-2xl"></i>
                    <div class="ml-2">
                        <span class="text-gray-900 font-semibold">Téléphone</span>
                        <span class="text-gray-500">+216 78 201 056</span>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <i class="fa-solid fa-location-dot fa-beat fa-2xl"></i>
                    <div class="ml-2">
                        <span class="text-gray-900 font-semibold">Map:</span>
                        <span class="text-gray-500">5 Rue Saleh Ayech - 7100 Kef</span>
                    </div>
                </div>
                <br>
                <div class="flex justify-center items-center">
                  <iframe class="rounded-xl whitespace-nowrap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15999.384120394112!2d8.707820175177519!3d36.170051770391574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fba44eb16009e5%3A0xea46e94b9ed2cde8!2sHigher%20Institute%20of%20Computer%20Science%20of%20Kef!5e0!3m2!1sen!2stn!4v1680144606729!5m2!1sen!2stn" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
        </div>

</main>


            <footer class="bg-white">
                <div class="mx-auto w-full p-4 sm:p-6 ">
                    <div class="md:flex md:justify-between">
                      <div class="mb-6 md:mb-0">
                              <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-800">Institut Supérieur d'Informatique du Kef</span>
                              <div >5 Rue Saleh Ayech - 7100 Kef <br>
                                Tél.: (216) 78 201 056 - Fax : (216) 78 200 237
                                </div>
                      </div>
                      <div class="grid grid-cols-2 sm:gap-1 sm:grid-cols-4 text-center">
              
                          <div class="w-24">
                              <a href="" class="mb-4 text-sm font-semibold text-gray-900">FAQ</a>
                          </div>
                          <div class="w-24">
                            <a href="" class="mb-4 text-sm font-semibold text-gray-900">Liens Utiles</a>
                        </div>
                        <div class="w-24">
                            <a href="" class="mb-4 text-sm font-semibold text-gray-900">Accés a l'information</a>
                        </div>
                        <div class="w-24">
                            <a href="" class="mb-4 text-sm font-semibold text-gray-900">Nous Contacter</a>
                        </div>
                      </div>
                  </div>
                  <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
                  <div class="sm:flex sm:items-center sm:justify-between">
                      <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                          <a href="https://www.facebook.com/profile.php?id=100057592473413" class="text-gray-500 hover:text-gray-900 ">
                              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                              <span class="sr-only">Facebook page</span>
                          </a>
                      </div>
                  </div>
                </div>
              </footer>
              <script src="../js/app.js"></script>
</body>
</html>