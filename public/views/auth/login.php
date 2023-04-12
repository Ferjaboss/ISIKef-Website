<?php
$error = '';
include 'db_conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['id'] = $id;
        header("Location: http://localhost/isik/index.php");
        exit();
    } else {
        $error = "Invalid email or password";
    }

    $stmt->close();
    $conn->close();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css\output.css">
    <link rel="stylesheet" href="../../public/fonts/fontawesome-free-6.3.0-web/css/all.css">
    <link rel="icon" type="image/x-icon" href="/img/logos/isik/logo.png">
    <title>Institut Supérieur de l'Informatique du Kef</title>
</head>
<body>
<?php include "../component/header.php" ?>
  
  <div class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="px-8 py-6 mt-4 text-left bg-white shadow-lg">
    <?php if ($error !== ''): ?>
      <?php echo '<div class="flex justify-center bg-red-600 rounded-lg text-lg text-white">'.$error.'</div>';?>
    <?php endif; ?>
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-blue-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path d="M12 14l9-5-9-5-9 5 9 5z" />
                <path
                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
            </svg>
        </div>
        <h3 class="text-2xl font-bold text-center">Login to your account</h3>
        <form action="" method="post">
            <div class="mt-4">
                <div>
                    <label class="block" for="email">Email<label>
                            <input type="text" placeholder="Email" name = "email"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 text-center">
                            <span class="text-xs tracking-wide text-red-600">Email field is required </span>
                </div>
                <div class="mt-4">
                    <label class="block">Password<label>
                            <input type="password" placeholder="Password" name="password"
                                class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600 text-center">
                </div>
                <div class="flex items-baseline justify-between">
                    <button class="px-6 py-2 mt-4 text-white bg-blue-600 rounded-lg hover:bg-blue-900">Login</button>
                    <a href="#" class="text-sm text-blue-600 hover:underline">Forgot password?</a>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Footer -->

<?php include "../component/footer.php" ?>

<script src="../../js/app.js"></script>
</body>
</html>
