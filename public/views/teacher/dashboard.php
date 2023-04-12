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
    <title>Prof Dashboard</title>
</head>
<body>
<header>
        <nav class="bg-white border-gray-200 px-36 py-8">
            <div class="flex flex-wrap items-center justify-between mx-auto">
            <a href="../../../index.php" class="flex items-center">
                <img src="../../img\logos\isik\banner.png" class=" h-16 mr-3 sm:max-h-20" alt="isi kef logo" />
                <span class="self-center text-xl font-semibold whitespace-nowrap "></span>
            </a>
            <div class="flex items-center">
                        <span class="mr-6 text-lg font-medium text-gray-500"> <?php echo $nom . ' ' . $prenom?></span>
                        <div class="relative">
                        <button class="profile-btn"><img src="../../views/auth/avatars/<?php echo $avatar ?>" class="w-12 h-12 rounded-full object-cover mr-4 shadow" alt="user avatar" /></button>'
                        <div  class="profile-menu absolute hidden bg-white border rounded shadow-md py-2 mt-2 w-48 left-0">
                        <a href="http://localhost/isik/public/views/auth/edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-user mr-2"></i>Profile</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <a href="http://localhost/isik/public/views/forum/" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-comments mr-2"></i>Forums</a>
                        <a href="http://localhost/isik/public/views/auth/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-sign-out-alt"></i>Se deconnecter</a>
                        </div>
                        </div>
            </div>
                </div>
        </nav>
</header>
   <h1 class="text-center mt-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl">Tableau de bord de Prof</h1>      
<main>
<div class="mx-auto my-40 max-w-7xl">       
    <div class="grid grid-cols-3 gap-2">
        <div class="h-auto max-w-full rounded-lg border-2 border-gray-600 relative">
                <img src="../..\img\resources\schedule.png" alt="">
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center text-16 font-bold cursor-pointer">Emploi</span> 
                <input type="file" name="avatar" id="avatar-input" class="hidden"> 
                </div>
        </div>
        <div class="h-auto max-w-full rounded-lg border-2 border-gray-600 relative">
                <img src="../..\img\resources\score.png" alt="">
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center text-16 font-bold cursor-pointer">Notes</span> 
                <input type="file" name="avatar" id="avatar-input" class="hidden"> 
                </div>
        </div>
        <div class="h-auto max-w-full rounded-lg border-2 border-gray-600 relative">
                 <img  src="../..\img\resources\courses.png" alt="" id=contact_us>
                <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50 opacity-0 transition-opacity duration-300 hover:opacity-100 cursor-pointer">
                <span class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-center text-16 font-bold cursor-pointer">Cours</span> 
                <input type="file" name="avatar" id="avatar-input" class="hidden"> 
                </div>
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
