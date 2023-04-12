<?php
session_start();
if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $msg = $_POST['msg'];
    $datetime = date('Y-m-d H:i:s'); 
    
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "isik";

    $conn = mysqli_connect($servername, $username, $db_password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
    }
    else {
        $user_id = NULL;
    }
    
    $sql = "INSERT INTO contactus (msgr_nom, msgr_prenom, msgr_email, msgr_sujet, msgr_msg, msgr_datetime) 
            VALUES ('$nom', '$prenom', '$email', '$sujet', '$msg', '$datetime')";
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

<?php include "component/header.php" ?>
    


<main class="bg-gray-200">
<nav class="flex mb-4 pt-8  mx-36" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="http://localhost/isik" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        Home
      </a>
    </li>
    <li aria-current="page">
      <div class="flex items-center">
        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Nous Contacter</span>
      </div>
    </li>
  </ol>
</nav>
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
              <div class="grid grid-cols-1 align-middle gap-2">
                <div class="flex justify-center items-center ">
                    <i class="fa-solid fa-phone fa-beat fa-2xl"></i>
                    <div class="ml-2">
                        <span class="text-gray-900 font-semibold">Téléphone:</span>
                        <span class="text-gray-500">+216 78 201 056</span>
                    </div>
                </div>
                                <div class="flex justify-center items-center ">
                    <i class="fa-solid fa-envelope fa-beat fa-2xl"></i>
                    <div class="ml-2">
                        <span class="text-gray-900 font-semibold">Email:</span>
                        <span class="text-gray-500">contact@isikef.u-jendouba.tn</span>
                    </div>
                </div>
                
                <div class="flex justify-center items-center">
                    <i class="fa-solid fa-location-dot fa-beat fa-2xl"></i>
                    <div class="ml-2">
                        <span class="text-gray-900 font-semibold">Map:</span>
                        <span class="text-gray-500">5 Rue Saleh Ayech - 7100 Kef</span>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                  <iframe class="rounded-xl whitespace-nowrap" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15999.384120394112!2d8.707820175177519!3d36.170051770391574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fba44eb16009e5%3A0xea46e94b9ed2cde8!2sHigher%20Institute%20of%20Computer%20Science%20of%20Kef!5e0!3m2!1sen!2stn!4v1680144606729!5m2!1sen!2stn" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
        </div>

</main>

<?php include "component/footer.php" ?>
              <script src="../js/app.js"></script>
</body>
</html>