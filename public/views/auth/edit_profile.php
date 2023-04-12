<?php
require 'db_conn.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('location:login.php');
    exit();
} else {
    $id = $_SESSION['id'];
    $stmt = $conn->prepare("SELECT nom, prenom,user_type,email,avatar,password FROM user WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($nom, $prenom, $user_type, $email, $avatar,$oldpassword);
    $stmt->fetch();
    $stmt->close();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $new_password = $_POST["new_password"];
        $new_avatar = $_FILES['avatar']['name'];
        
        if ($password != "" && password_verify($password, $oldpassword)) {
            
            if ($new_password == "") {
                $new_password = $oldpassword;
            } else {
                $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            }
            if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
                unlink("/avatars/" . $avatar);
                $timestamp = time();
                $avatarFile = $_FILES['avatar']['tmp_name'];
                $avatarName = $_FILES['avatar']['name'];
                $avatarName = $timestamp . '_' . $avatarName;
                $avatarPath = 'avatars/' . $avatarName;
                
                if (!move_uploaded_file($avatarFile, $avatarPath)) {
                    die('Error uploading file');
                }
                $avatar = $avatarName;
            } 
           
            $stmt = $conn->prepare("UPDATE user SET avatar = ?, nom = ?, prenom = ?, email = ?, password = ? WHERE id = ?");
            $stmt->bind_param("ssssss", $avatar,$nom, $prenom, $email, $new_password, $id);
            $stmt->execute();
            $stmt->close();
            
            
            header("Location: login.php");
            exit();
        } else {
            header("Location: http://localhost/isik/public/views/auth/edit_profile.php?message=mot de passe incorrect."); 
        }
    }
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/output.css">
    <link rel="stylesheet" href="../../fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.ico">
    <title>Institut Supérieur de l'Informatique du Kef</title>
</head>
<body>
  <?php
if (isset($_GET['message'])) {
  $message = $_GET['message'];
  echo'<div id="message" class="flex justify-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-indigo-200 " role="alert">';
  echo'<svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>';
  echo'<span class="sr-only">Info</span>';
  echo'<div>';
  echo '<span class="font-medium">' . $message . '</span>';
  echo '  </div></div>';
}
?>

<script>
  setTimeout(function() {
    var message = document.getElementById("message");
    if (message != null) {
      message.style.display = "none";
    }
  }, 2000);
</script>
  <header>
<?php include "../component/header.php" ?>
  </header>
  <main class="mt-3 bg-gray-100">
<div class="container mx-auto py-8 max-w-7xl">
    <form class="bg-gradient-to-r bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4" method="post" enctype="multipart/form-data">
        <div class="grid grid-cols-1 place-items-center">
                      <div class="font-mono text-xl">
                <h4>Type de Profile : <?php 
                    switch ($user_type) {
                        case 'etd':
                            echo 'Etudiant';
                            break;
                        case 'prof':
                            echo 'Enseignant';
                            break;
                        case 'adm':
                            echo 'Administrateur';
                            break;
                        default:
                            echo 'Inconnu';
                            break;
                    }
                ?></h4>
            </div>
            <div class="mt-4 relative w-60 h-60 avatar-container ">
                  <img src="avatars/<?php echo $avatar; ?>" class="avatar w-60 h-60 rounded-full object-cover mr-4" alt="User avatar">
                  <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 rounded-full hover:opacity-100 cursor-pointer">
                    <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center text-16 font-bold cursor-pointer">Changer l'avatar</span> 
                    <input type="file" name="avatar" id="avatar-input" class="hidden"> 
                  </div>
            </div>  
        </div>
              <div>
                <label class="block" for="id">ID<label>
                        <input type="text" placeholder="Num carte d'identité" disabled name="id" value="<?php echo $id; ?> "
                            class="cursor-not-allowed w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 ">
              </div>
                <div>
                    <label class="block" for="Nom">Nom<label>
                            <input type="text" placeholder="Nom" name="nom" value="<?php echo $nom; ?>"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                <div>
                    <label class="block" for="Prenom">Prenom<label>
                            <input type="text" placeholder="Prenom" name="prenom" value="<?php echo $prenom; ?>"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email<label>
                            <input type="text" placeholder="Email" name="email" value="<?php echo $email; ?>"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                <div class="mt-4">
                    <label class="block">Mot de passe<label>
                            <input type="password" placeholder="Mot de passe" name="password" 
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
                                <div class="mt-4">
                    <label class="block">Nouveau Mot de passe<label>
                            <input type="password" placeholder="Nouveau Mot de passe" name="new_password" 
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" >
                </div>
           
                <div class="flex">
                    <button class="w-full px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">
                        Mettre à jour le profil</button>
                </div>
            </div>
    </form>
<script>    
const avatarContainer = document.querySelector('.avatar-container');
const avatarInput = document.querySelector('#avatar-input');
const avatarImage = document.querySelector('.avatar');

avatarContainer.addEventListener('click', () => {
avatarInput.click();
});

avatarInput.addEventListener('change', () => {
const file = avatarInput.files[0];
if (file) {
const reader = new FileReader();
reader.addEventListener('load', () => {
avatarImage.src = reader.result;
});
reader.readAsDataURL(file);
}
});</script>
</div>
  </main>


<?php include "../component/footer.php" ?>
<script src="../../js/app.js"></script>
<script src="../../js/edit_profile.js"></script>
<script src="../../js/avatar.js"></script>
</body>
</html>

</html>
