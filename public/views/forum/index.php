<?php include '../auth/db_conn.php'; ?>
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

<main class="bg-gray-200 min-h-screen">
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
            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Forum</span>
        </div>
        </li>
    </ol>
</nav>
<section class="bg-gray-200">
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                  <a href="#" id="new-topic-btn" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                  <i class="fa-solid fa-plus"></i>  Nouveau Sujet
                  </a>
                <div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-500 bg-opacity-75">
                      <div class="relative w-full h-full max-w-md md:h-auto">
                          <div class="relative bg-white rounded-lg shadow ">
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="authentication-modal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                                </button>
                                <div class="px-6 py-6 lg:px-8">
                                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Créer un nouveau sujet</h3>
                                <form class="space-y-6" action="" method="post">
                                <div>
                                          <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 ">Titre :</label>
                                          <input type="text" name="titre" id="titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="HOW TO CENTER A DIV" required>
                                </div>
                                <div>
                                          <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Text :</label>
                                          <textarea name="text" id="text" placeholder="Type Whatever On your mind" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required></textarea>
                                </div>
                                  <button type="submit" class="w-full text-white bg-indigo-500 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Soumettre</button>
                                  </form>
                <?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
    $titre = $_POST["titre"];
    $text = $_POST["text"];
    $stmt = $conn->prepare("INSERT INTO topic (user_id,title,body) VALUES (?,?,?)");
    $stmt->bind_param("sss", $id, $titre, $text);
    $stmt->execute();
    $stmt->close();
}
?>
                              </div>
                          </div>
                      </div>
                  </div> 
            </div>
      </div>
</div>
  <div class="max-w-2xl mx-auto px-4">
        <?php
          $topic = $conn->query("SELECT topic.*, user.nom, user.prenom, user.avatar, COUNT(comment.id) AS comment_count FROM topic LEFT JOIN user ON topic.user_id = user.id LEFT JOIN comment ON topic.id = comment.topic_id GROUP BY topic.id ORDER BY created_at DESC");
          $topics = $topic->fetch_all(MYSQLI_ASSOC);
          foreach ($topics as $topic) { ?>
                  <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                class="w-12 h-12 rounded-full object-cover mr-2"
                                src="../../views/auth/avatars/<?php echo $topic['avatar'];?>"
                                alt="Michael Gough"><?php echo $topic['nom'].' '.$topic['prenom'];?></p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><?php echo $topic['created_at'];?></p>
                    </div>
                    <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                        class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        type="button">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
                            </path>
                        </svg>
                        <span class="sr-only">Comment settings</span>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownComment1"
                        class="hidden z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownMenuIconHorizontalButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
                            </li>
                        </ul>
                    </div>
                </footer>
                <h2 class="mb-2 text-2xl font-bold text-gray-900 dark:text-white"><?php echo $topic['title'];?></h2>
                <p class="text-gray-500 dark:text-gray-400"><?php echo $topic['body'];?></p>
                <div class="flex items-center mt-4 space-x-4">
                    <a href="reply.php?id=<?php echo $topic['id']; ?>"><button type="button"
                        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400">
                        <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                       Répondre (<?php echo $topic['comment_count']; ?>)
                    </button></a>
                </div>
            </article>
         <?php } ?>
  </div>
</section>


</main>

<?php include '../component/footer.php' ?>
<script>
  const newTopicBtn = document.getElementById('new-topic-btn');
  const authModal = document.getElementById('authentication-modal');
  const modalHideButtons = document.querySelectorAll('[data-modal-hide]');

  newTopicBtn.addEventListener('click', () => {
    authModal.classList.remove('hidden');
  });

  modalHideButtons.forEach(button => {
    button.addEventListener('click', () => {
      authModal.classList.add('hidden');
    });
  });
</script>
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
  });
</script>
<script src="../../js/app.js"></script>
<script src="../../js/verify.js"></script>
</body>
</html>

