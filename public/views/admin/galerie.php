<?php
ob_start();
require '../auth/db_conn.php';
session_start();
if (!isset($_SESSION['id'])) {
    header('location: ../auth/login.php');
    exit();
} else {
    $id = $_SESSION['id'];
    $stmt = $conn->prepare("SELECT nom, prenom,user_type,avatar FROM user WHERE id=?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->bind_result($nom, $prenom, $user_type, $avatar);
    $stmt->fetch();
    $stmt->close();
    if ($user_type != 'adm') {
        header('location: ../auth/login.php');
        exit();
    }
}
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
<?php include "../component/mini_header.php" ?>
  </header>
    

<section class="bg-gray-200 min-h-screen">
<h2 class="col-span-3 mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 pt-4">Galerie</h2>
 

  <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
            <a href="#" id="new-topic-btn" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
  <i class="fa-solid fa-plus"></i>  Nouvelle Image
</a>
<div id="authentication-modal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-gray-500 bg-opacity-75">
    <div class="relative w-full h-full max-w-md md:h-auto">
        <div class="relative bg-white rounded-lg shadow ">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="authentication-modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 ">Ajouter Une Image</h3>
                <form class="space-y-6" action="" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="titre" class="block mb-2 text-sm font-medium text-gray-900 ">Titre :</label>
                        <input type="text" name="titre" id="titre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="Fêtes de fin d'année">
                    </div>
                    <div>
                        <label for="image" class="block mb-2 text-sm font-medium text-gray-900 ">Image :</label>
                        <input class="block w-full mb-5 text-xs text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none " id="small_size" type="file" name="image">
                    </div>
                    <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Soumettre</button>
                </form>
            
                <?php
                if(isset($_POST['submit'])) {
                    $titre = $_POST['titre'];
                    $timestamp = time();
                    $targetDir = "../../img/gallery/";
                    $fileName = $timestamp . '_' . basename($_FILES["image"]["name"]);
                    $targetFilePath = $targetDir . $fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                    $allowTypes = array('jpg','jpeg','png','gif');
                    if(in_array($fileType, $allowTypes)){
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)){
                    $stmt = $conn->prepare("INSERT INTO gallery (title,image) VALUES (?, ?)");
                    $stmt->bind_param("ss", $titre, $fileName);
                    $stmt->execute();
                    $stmt->close();
                    header("Refresh:0");
                    }else{
                        echo "Sorry, there was an error uploading your file.";
                    }
                }else{
                    echo 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
                }
            }
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
    
<div class="relative max-w-7xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 mb-8">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Image
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-0 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
      $sql = "SELECT * FROM gallery";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr class="bg-white border-b ">
                <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap">
                    <img class="h-auto rounded-2xl max-w-xs"src="../../img/gallery/<?php echo $row['Image']; ?>" alt="">
                </th>
                <td class="px-6 py-4">
                    <?php echo $row['Title']; ?>
                </td>
                <td class="px-0 py-4">
                <form method="POST" action="">
                    <input type="hidden" name="image_id" value="<?php echo $row['id']; ?>">
                    <button type="submit" name="delete_image" class="font-medium text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this image?')"><i class="fa-sharp fa-solid fa-trash"></i>Supprimer</button>
                </form>
    </td>
</tr>
<?php
}
if (isset($_POST['delete_image'])) {
    $image_id = $_POST['image_id'];
    $sql = "SELECT Image FROM gallery WHERE id = '$image_id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $image_path = "../../img/gallery/" . $row['Image'];
    unlink($image_path);
    $sql = "DELETE FROM gallery WHERE id = '$image_id'";
    mysqli_query($conn, $sql);
    header("Refresh:0");
    ob_end_flush();
}

?>
        </tbody>
    </table>
</div>

    
</section>

<?php require '../component/footer.php' ?>
<script src="../../js/avatar.js"></script>
</body>
</html>