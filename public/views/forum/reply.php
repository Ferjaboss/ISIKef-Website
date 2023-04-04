<?php
    session_start();
    $mysqli = new mysqli('localhost', 'root', '', 'isik');
    $result = $mysqli->query('SELECT * FROM topic join user on topic.user_id = user.id WHERE topic.id = ' . $_GET['id']);
    $topic = $result->fetch_assoc();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mysqli->query("INSERT INTO comment (user_id, topic_id, body) VALUES ({$_SESSION['id']}, {$_GET['id']}, '{$_POST['body']}')");
        header('Location: reply.php?id=' . $_GET['id']);
        exit;
    }
    $commentsResult = $mysqli->query("SELECT * FROM comment join user on comment.user_id = user.id WHERE topic_id = {$_GET['id']}");
    $comments = $commentsResult->fetch_all(MYSQLI_ASSOC);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/output.css">
    <link rel="stylesheet" href="../../fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.png">
    <title>Institut Supérieur de l'Informatique du Kef</title>
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
                    <?php     
                    if(isset($_SESSION['id'])) {
                        $servername = "localhost";
                        $username = "root";
                        $db_password = "";
                        $dbname = "isik";
                        $conn = mysqli_connect($servername, $username, $db_password, $dbname);
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }
                        $id = $_SESSION['id'];
                        $stmt = $conn->prepare("SELECT nom, prenom, avatar FROM user WHERE id=?");
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $stmt->bind_result($nom, $prenom, $avatar);
                        $stmt->fetch();
                        echo '<span class="mr-6 text-lg font-medium text-gray-500">' . $nom . ' ' . $prenom . '</span>';
                        echo'<div class="relative">';
                        echo '<button class="profile-btn"><img src="../../views/auth/avatars/' . $avatar . '" class="w-12 h-12 rounded-full object-cover mr-4 shadow" alt="user avatar" /></button>';
                        echo '<div  class="profile-menu absolute hidden bg-white border rounded shadow-md py-2 mt-2 w-48 left-0">';
                        echo '<a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-user mr-2"></i>Profile</a>';
                        echo '<a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-tachometer-alt mr-2"></i>Dashboard</a>';
                        echo '<a href="http://localhost/isik/public/views/forum/" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-comments mr-2"></i>Forums</a>';
                        echo '<a href="http://localhost/isik/public/views/auth/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-sign-out-alt mr-2"></i>Se deconnecter</a>';
                        echo '</div>';
                        echo '</div>';
                        $stmt->close();
                        $conn->close();
                    } else {
                        echo '<a href="tel:21678201056" class="mr-6 text-lg font-medium text-gray-500  hover:underline">(216) 78 201 056</a>';
                        echo '<a href="../views/auth/login.php" class="mr-6 text-lg font-medium text-blue-600  hover:underline">Se connecter</a>';
                        echo '<a href="../views/auth/register.php" class="mr-6 text-lg font-medium text-blue-600  hover:underline">S\'inscrire</a>';
                    }
                ?>
            </div>
        </div>
    </nav>
</header> 
<main class="bg-gray-200 min-h-screen pb-8">
  <div class="pt-8  mx-36">       
    <a href="http://localhost/isik">Home</a>
    <i class="fa-light fa-greater-than" style="color: #000000;"></i>
    <a href="http://localhost/isik/public/views/forum/">Forums</a>
    <i class="fa-light fa-greater-than" style="color: #000000;"></i>
    <a href="">Post n: <?php echo $_GET['id']; ?></a>
  </div>
  <br>
<section class="py-8 lg:py-16">
    <article class="p-6 mb-6 text-base rounded-lg ">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                        class="w-12 h-12 rounded-full object-cover mr-4 shadow"
                        <?php echo 'src="http://localhost/isik/public/views/auth/avatars/'.$topic['avatar'].'"'; ?>
                        alt="Topic_author"><?php echo ''.$topic['nom']." ".$topic['prenom']; ?></p>
                <p class="text-sm text-gray-600 "><?php echo$topic['created_at'] ?></p>
            </div>
        </footer>
        <h2>Titre : <?php echo $topic['title']; ?></h2>
        <p class="text-gray-500 "><?php echo $topic['body']; ?></p>
    </article>
  </div>
  <?php foreach ($comments as $comment) { ?>
      <article class="p-6 mb-6 ml-6 lg:ml-12 text-base rounded-lg ">
        <footer class="flex justify-between items-center mb-2">
            <div class="flex items-center">
                <p class="inline-flex items-center mr-3 text-sm text-gray-900 "><img
                        class="w-10 h-10 rounded-full object-cover mr-4 shadow"
                         <?php echo 'src="http://localhost/isik/public/views/auth/avatars/'.$comment['avatar'].'"'; ?>
                        alt="Comment_Author"><?php echo ''.$comment['nom']." ".$comment['prenom']; ?></p>
                <p class="text-sm text-gray-600 "><?php echo$comment['comment_created_at'] ?></p>
            </div>
        </footer>
        <p class="text-gray-500 "><?php echo $comment['body']; ?></p>
    </article>
    <?php } ?>
</section>
   
            <div class="max-w-2xl ml-6 lg:ml-12 px-4">
                <form class="mb-6" method="post">
                <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea name="body"
                        id="comment" rows="6"
                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
                        placeholder="Write a comment..." required></textarea>
                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200  hover:bg-primary-800">
                    Post comment
                </button>
            </form>
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
              <a href="public\views\footer\acces_info.php" class="mb-4 text-sm font-semibold text-gray-900">Accés a l'information</a>
          </div>
          <div class="w-24">
              <a href="./public/views/contact.php" class="mb-4 text-sm font-semibold text-gray-900">Nous Contacter</a>
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
<script src="../../js/app.js"></script>
<script src="../../js/verify.js"></script>
</body>
</html>

