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
        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Présentation</span>
      </div>
    </li>
  </ol>
</nav>
    <div class=" grid grid-cols-3">
              <div class="col-span-2 mx-10 mt-10">
                  <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 ">Présentation</h2>
                  <p class="mb-8 lg:mb-16 font-light  text-gray-500  sm:text-xl">   L’Institut  Supérieur d’Informatique du Kef a été crée selon le décret n°06-1587 du 6 juin 2006 portant création d’établissements  d’enseignement supérieur et de recherche.
                      En effet, l’ISIKef est l’une des établissements universitaires de l’université de Jendouba. <br>
                      Responsables : <br>
                      Directeur : Mr. Hayouni Mohamed <br>
                      Secrétaire général : Mr. KHAMMASSI AISSA <br>
                      Cordonnées :<br>
                      Adresse : 5 rue Salah Ayache 7100 Le Kef <br>
                      Téléphone : 78 201 056    Fax : 78 200 237 <br>
                      Site web : www.isikef.rnu.tn</p>
              </div>
              <div class="my-auto rounded-2xl mr-4 overflow-hidden">
                    <img src="../../public/img/resources/kef.jpg" alt="el kef">
            </div>
            
        </div>

</main>

<?php include "component/footer.php" ?>
              <script src="../js/app.js"></script>
</body>
</html>