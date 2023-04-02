
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
                    session_start();
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
                        echo '<a href="#" class="block px-4 py-2 text-gray-800 hover:bg-indigo-500 hover:text-white"><i class="fas fa-comments mr-2"></i>Forums</a>';
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
<main class="bg-gray-200 min-h-screen">

  <div class="pt-8  mx-36">       
    <a href="http://localhost/isik">Home</a>
    <i class="fa-light fa-greater-than" style="color: #000000;"></i>
    <a href="">Forums</a>
  </div>



  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
            <a href="#" id="new-topic-btn" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
  <i class="fa-solid fa-plus"></i>  Nouveau Sujet
</a>
<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-500 bg-opacity-75">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Créer un nouveau sujet</h3>
                <form class="space-y-6" action="#" method="post">
                    <div>
                        <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 ">Titre :</label>
                        <input type="text" name="titre" id="titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="HOW TO CENTER A DIV" required>
                    </div>
                    <div>
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Text :</label>
                        <textarea name="text" id="text" placeholder="Type Whatever On your mind" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " required></textarea>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Soumettre</button>

                </form>
                <!-- 
                    Store the topic in the database

                -->
                <?php 
                $conn = mysqli_connect($servername, $username, $db_password, $dbname);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                  }
                
                  if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $titre = $_POST["titre"];
                    $text = $_POST["text"];

                    $sql = "INSERT INTO topic (user_id,title,body) VALUES ($id,'$titre', '$text')";
                    if (mysqli_query($conn, $sql)) {
                      echo "Data inserted successfully";
                    } else {
                      echo "Error inserting data: " . mysqli_error($conn);
                    }
                  }
                  
                  mysqli_close($conn);
                
                ?>

            </div>
            
        </div>
    </div>
</div> 
<script>const newTopicBtn = document.getElementById('new-topic-btn');
const authModal = document.getElementById('authentication-modal');
const modalHideButtons = document.querySelectorAll('[data-modal-hide]');

newTopicBtn.addEventListener('click', () => {
  authModal.classList.remove('hidden');
});

modalHideButtons.forEach(button => {
  button.addEventListener('click', () => {
    authModal.classList.add('hidden');
  });
});</script>


            </div>

        </div>
    </div>
    <?php
    $conn = mysqli_connect($servername, $username, $db_password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    function getCommentCount($topic_id) {
        global $servername, $username, $db_password, $dbname;

        $conn = mysqli_connect($servername, $username, $db_password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT COUNT(*) AS comment_count FROM comment WHERE topic_id = $topic_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['comment_count'];
    }

    $sql = "SELECT topic.*, user.nom, user.prenom, user.avatar FROM topic LEFT JOIN user ON topic.user_id = user.id ORDER BY created_at DESC";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<table class="text-center">';
        echo '<thead><tr><th>Topic</th><th>User</th><th>Date</th><th>Comments</th></tr></thead>';
        echo '<tbody>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td><h1>' . $row['title'] . '</h1>' . $row['body'] . '</td>';
            echo '<td><img src="../auth/avatars/' . $row['avatar'] . '" alt="Avatar" class="w-12 h-12 rounded-full object-cover mr-4 shadow">' . $row['nom'] . ' ' . $row['prenom'] . '</td>';
            echo '<td>' . $row['created_at'] . '</td>';
            echo '<td>' . getCommentCount($row['id']) . '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    }

    mysqli_close($conn);
?>

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