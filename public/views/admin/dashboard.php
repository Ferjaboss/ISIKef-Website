<?php
    require '../auth/db_conn.php';
    session_start();
    if(!isset($_SESSION['id']) ){
        header('Location: ../auth/login.php');
    }
    else{
        $id = $_SESSION['id'];
        $stmt = $conn->prepare("SELECT nom, prenom,user_type,email,avatar,password FROM user WHERE id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($nom, $prenom, $user_type, $email, $avatar,$oldpassword);
        $stmt->fetch();
        $stmt->close();
    }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css\output.css">
    <link rel="stylesheet" href="../../fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.png">
    <title>Admin Dashboard</title>
</head>
<body>
<header>
<?php include "../component/mini_header.php" ?>
</header>
   <h1 class="text-center mt-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">Tableau de bord d'admin</h1>      
<main>
<div class="mx-auto my-40 max-w-7xl">  
  
    <div class="grid grid-cols-3 gap-2">
        <div class="h-auto max-w-full rounded-lg border-2 border-gray-600 relative">
                <a href="http://localhost/isik/public/views/admin/events.php"><img src="../..\img\resources\event.png" alt="">
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center text-16 font-bold cursor-pointer">Actualités et Evénements</span> 
                </div></a>
        </div>
        <div class="h-auto max-w-full rounded-lg border-2 border-gray-600 relative">
                <a href="http://localhost/isik/public/views/admin/galerie.php"><img src="../..\img\resources\galerie.png" alt="">
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center text-16 font-bold cursor-pointer">Galerie</span> 
                </div></a>
        </div>
        <div class="h-auto max-w-full rounded-lg border-2 border-gray-600 relative">
                <a href="http://localhost/isik/public/views/admin/contact.php"><img  src="../..\img\resources\messenger.png" alt="" id=contact_us>
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center text-16 font-bold cursor-pointer">Messages</span> 
                </div></a> 
        </div>
    </div>
</div>
</main>
</body>
<script>
const profileBtn = document.querySelector('.profile-btn');
const profileMenu = document.querySelector('.profile-menu');

profileBtn.addEventListener('click', () => {
  if (profileMenu.classList.contains('hidden')) {
    profileMenu.classList.remove('hidden');
  } else {
    profileMenu.classList.add('hidden');
  }
});

document.addEventListener('click', (event) => {
  if (!profileBtn.contains(event.target) && !profileMenu.contains(event.target)) {
    profileMenu.classList.add('hidden');
  }
});</script>
</html>
