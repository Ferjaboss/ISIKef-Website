<header>
<nav class="bg-white border-gray-200 px-36 py-8">
  <div class="flex flex-wrap items-center justify-between mx-auto">
    <a href="../../../index.php" class="flex items-center">
        <img src="../../img\logos\isik\banner.png" class=" h-16 mr-3 sm:max-h-20" alt="isi kef logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap "></span>
    </a>
            <div class="flex items-center">
                <?php     
                    if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                    }
                    if(isset($_SESSION['id'])) {
                        require '../auth/db_conn.php';
                        $id = $_SESSION['id'];
                        $stmt = $conn->prepare("SELECT nom, prenom, avatar,user_type FROM user WHERE id=?");
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $stmt->bind_result($nom, $prenom, $avatar,$user_type);
                        $stmt->fetch();?>
                        <span class="mr-6 text-lg font-medium text-gray-500"><?php echo $nom . ' ' . $prenom ;?></span>
                        <div class="relative">
                        <button class="profile-btn"><img src="../../views/auth/avatars/<?php echo $avatar ?>" class="w-12 h-12 rounded-full object-cover mr-4 shadow" alt="user avatar" /></button>
                        <div  class="profile-menu absolute hidden bg-white border rounded shadow-md py-2 mt-2 w-48 left-0">
                        <a href="http://localhost/isik/public/views/auth/edit_profile.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-user mr-2"></i>Profile</a>
                        <a href="<?php
                        if($user_type == 'adm'){
                            echo 'http://localhost/isik/public/views/admin/dashboard.php';
                        }else if ($user_type == 'etd'){
                            echo 'http://localhost/isik/public/views/student/dashboard.php';
                        }
                        else if ($user_type == 'prof'){
                            echo 'http://localhost/isik/public/views/teacher/dashboard.php';
                        }
                        ?>" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>
                        <a href="http://localhost/isik/public/views/forum/" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-comments mr-2"></i>Forums</a>
                        <a href="http://localhost/isik/public/views/auth/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-sign-out-alt mr-2"></i>Se deconnecter</a>
                        </div>
                        </div>
                        <?php
                        $stmt->close();
                        ?>
                   <?php } else { ?>
                        <a href="tel:21678201056" class="mr-6 text-lg font-medium text-gray-500  hover:underline">(216) 78 201 056</a>
                        <a href="../views/auth/login.php" class="mr-6 text-lg font-medium text-blue-600  hover:underline">Se connecter</a>
                        <a href="../views/auth/register.php" class="mr-6 text-lg font-medium text-blue-600  hover:underline">S\'inscrire</a>
                   <?php } ?>
               
            </div>
        </div>
    </nav>
</header> 