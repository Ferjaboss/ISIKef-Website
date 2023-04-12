
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/output.css">
    <link rel="stylesheet" href="./public/fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.png">
    <title>Institut Supérieur de l'Informatique du Kef</title>
</head>
<body >
<header>
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
<nav class="bg-white border-gray-200 py-1 ">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl px-4 md:px-6">
        <a href="http://www.uj.rnu.tn" class="flex items-center">
            <img src="public/img/logos/UJ/logo.png" class="h-8 mr-3 sm:h-12" alt="uni jendouba logo" />
            <span class="self-center text-xl font-semibold whitespace-nowrap "></span>
        </a>
        <div class="flex items-center">
 <?php     
                    if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                    require 'public/views/auth/db_conn.php';
                        
                    }
                    if(isset($_SESSION['id'])) {
                        $id = $_SESSION['id'];
                        $stmt = $conn->prepare("SELECT nom, prenom, avatar,user_type FROM user WHERE id=?");
                        $stmt->bind_param("i", $id);
                        $stmt->execute();
                        $stmt->bind_result($nom, $prenom, $avatar,$user_type);
                        $stmt->fetch();?>
                        <span class="mr-6 text-lg font-medium text-gray-500"><?php echo $nom . ' ' . $prenom ;?></span>
                        <div class="relative z-50">
                        <button class="profile-btn"><img src="http://localhost/isik/public/views/auth/avatars/<?php echo $avatar ?>" class="w-12 h-12 rounded-full object-cover mr-4 shadow" alt="user avatar" /></button>
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
                        <a href="public/views/auth/login.php" class="mr-6 text-lg font-medium text-blue-600  hover:underline">Se connecter</a>
                        <a href="public/views/auth/register.php" class="mr-6 text-lg font-medium text-blue-600  hover:underline">S'inscrire</a>
                   <?php } ?>
        </div>
    </div>
</nav>
<?php include "public/views/component/header.php" ?>
</header>

<main>  

<section class="min-h-screen bg-gray-200">
    <div id="controls-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative rounded-lg" style="width: 1400x; height: 700px;">
             <!-- Item 1 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="public\img\Diaporama\bg.jpg" class="w-full h-full object-fit absolute block" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="duration-700 ease-in-out" data-carousel-item="active">
                <img src="public\img\Diaporama\isik4.jpg" class="w-full h-full object-fit absolute block" alt="...">
            </div>
            <!-- Item 3 -->
            <div class="duration-700 ease-in-out" data-carousel-item>
                <img src="public\img\Diaporama\2.jpg" class="w-full h-full object-fit absolute block" alt="...">
            </div>
        </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<div class="grid grid-cols-2 mt-8">
<div class="ml-12 mb-8">
  <h2 class="text-4xl tracking-tight font-medium text-left text-gray-700 mb-4">événements Et Actualité</h2>
<ol class="relative border-l border-gray-200 dark:border-gray-700">                  
<?php 
$sql = "SELECT * FROM events";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo '<li class="mb-10 ml-6">';
        echo '<h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">' . $row["title"] . '</h3>';
        echo '<time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">en ' . $row["release_date"] . '</time>';
        echo '<p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">' . $row["description"] . '</p>';
        echo '<a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-blue-700 "> Download ZIP</a>';
        echo '</li>';
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
</ol>

  </div>
  <div>
    
  </div>
</div>
</section>
</main>

<?php include "public/views/component/footer.php" ?>
<script>
    const carouselItems = document.querySelectorAll('[data-carousel-item]');
    const prevButton = document.querySelector('[data-carousel-prev]');
    const nextButton = document.querySelector('[data-carousel-next]');

    let currentItem = 0;

    function showItem(index) {
      // hide all items
      carouselItems.forEach((item) => {
        item.classList.remove('opacity-100');
        item.classList.add('opacity-0');
      });

      // show the current item
      carouselItems[index].classList.remove('opacity-0');
      carouselItems[index].classList.add('opacity-100');
    }

    function nextItem() {
      currentItem++;
      if (currentItem >= carouselItems.length) {
        currentItem = 0;
      }
      showItem(currentItem);
    }

    function prevItem() {
      currentItem--;
      if (currentItem < 0) {
        currentItem = carouselItems.length - 1;
      }
      showItem(currentItem);
    }

    // show the first item
    showItem(currentItem);

    // set the slideshow interval
    setInterval(() => {
      nextItem();
    }, 5000);

    // add click event listeners to the buttons
    prevButton.addEventListener('click', () => {
      prevItem();
    });

    nextButton.addEventListener('click', () => {
      nextItem();
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
<script src="public\js\app.js"></script>
</body>
</html>
