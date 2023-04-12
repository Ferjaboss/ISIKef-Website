<?php
ob_start();
session_start();
require '../auth/db_conn.php';
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
<h2 class="col-span-3 mb-12 text-4xl tracking-tight font-extrabold text-center text-gray-900 pt-4">Contact</h2>
 

    
<div class="relative max-w-7xl mx-auto overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-center text-gray-500 border ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
            <tr>
                <th scope="col" class="w-11/12 py-3 border-r-4">
                    Message
                </th>
                <th scope="col" class="w-1/12 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
      $sql = "SELECT * FROM contactus ORDER BY id DESC";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)) {
    ?>
            <tr class="bg-white border-b ">
                <th scope="row" class="px-4 py-4 text-gray-900 whitespace-nowrap border-r-4 text-left">
                    <!-- 
                    <?php echo $row['msgr_nom']; ?>
                    <?php echo $row['msgr_prenom']; ?>
                    <?php echo $row['msgr_email']; ?>
                    
                     -->
<time class="mb-1 text-sm font-normal leading-none text-gray-400 ">de <?php echo $row['msgr_nom']." ".$row['msgr_prenom']." en ".$row['msgr_datetime']."  ||  ".$row['msgr_email']; ?></time>
<h3 class="text-lg font-semibold text-gray-900 dark:text-white"><?php echo $row['msgr_sujet']; ?></h3>
<p class="text-base font-normal text-gray-500 dark:text-gray-400"><?php echo $row['msgr_msg']; ?></p>

                </th>
                <td class="items-center">
                    <div> <form method="POST" action="">
                            <input type="hidden" name="msg_id" value="<?php echo $row['id']; ?>">
                            <button type="submit" name="delete-message" class="font-medium text-red-600 hover:underline" onclick="return confirm('Are you sure you want to delete this message?')"><i class="fa-sharp fa-solid fa-trash"></i>Supprimer</button>
                        </form>

                </div>
                </td>
</tr>
<?php
}
if (isset($_POST['delete-message'])) {
    $msg_id = $_POST['msg_id'];
    $sql = "DELETE FROM contactus WHERE id = '$msg_id'";
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