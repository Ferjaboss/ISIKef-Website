<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css\output.css">
    <link rel="stylesheet" href="../../public/fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.png">
    <title>Institut Supérieur de l'Informatique du Kef</title>
</head>
<body>
<!--Nav Bar-->
<?php include "../component/header.php" ?>
  <div class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="px-8 py-6 mx-4 my-8 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-center">Join us</h3>
        <form action="add_user.php" method="POST" enctype="multipart/form-data">
          
            <div class="mt-4">
            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
              <div>
                <label class="block" for="id">ID<label>
                        <input type="text" placeholder="Num carte d'identité" name="id"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
            </div>
                <div>
                    <label class="block" for="Nom">Nom<label>
                            <input type="text" placeholder="Nom" name="nom"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                <div>
                    <label class="block" for="Prenom">Prenom<label>
                            <input type="text" placeholder="Prenom" name="prenom"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                <div>       
                  <label for="user_type" class="block">Vous etes</label>
                  <select id="user_type" name="user_type" class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                    <option value="etd" name="etd">Etudiant(e)</option>
                    <option value="prof" name="prof">Professeur</option>
                    <option value="adm" name="adm">Administrateur/Moderateur</option>
                  </select>
              </div>
                <div class="mt-4">
                    <label class="block" for="email">Email<label>
                            <input type="text" placeholder="Email" name="email"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                <div class="mt-4">
                    <label class="block">Mot de passe<label>
                            <input type="password" placeholder="Mot de passe" name="password"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                <div class="mt-4">
                    <label class="block">Avatar<label>
                            <input type="file" name="avatar" accept="image/*" 
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
           
                <div class="flex">
                    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                        Créer un compte</button>
                </div>
                <div class="mt-6 text-grey-dark">Vous avez déjà un compte?
                    <a class="text-blue-600 hover:underline" href="login.php">
                        Connexion
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Script Pour la forme -->
<script></script>
<!-- Footer -->

<?php include "../component/footer.php" ?>
<script src="../../js/verify.js"></script>
<script src="../../js/app.js"></script>
</body>
</html>
