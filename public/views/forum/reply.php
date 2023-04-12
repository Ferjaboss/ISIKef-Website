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
<?php include "../component/mini_header.php" ?>

<main class="bg-gray-200 min-h-screen pb-8">
<nav class="flex mb-4 pt-8  mx-36" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3">
        <li class="inline-flex items-center">
        <a href="http://localhost/isik" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
            Home
        </a>
        </li>
            <li class="inline-flex items-center">
            <a href="http://localhost/isik/public/views/forum" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            Forums
        </a>
        </li>
        <li aria-current="page">
        <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Post n: <?php echo $_GET['id']; ?></span>
        </div>
        </li>
    </ol>
</nav>




<section class="bg-gray-200 dark:bg-gray-900 py-8 lg:py-16">
  <div class="max-w-2xl mx-auto px-4">
<article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
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
    <?php foreach ($comments as $comment) { ?>
    <article class="p-6 mb-6 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900">
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
        <div class="flex items-center mt-4 space-x-4">
        </div>
    </article>
   <?php } ?>
   
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
                    Répondre
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
