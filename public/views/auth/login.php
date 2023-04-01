<?php
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // get the form inputs
    $email = $_POST['email'];
    $password = $_POST['password'];

    // connect to the database
    $servername = "localhost";
    $username = "root";
    $db_password = "";
    $dbname = "isik";

    // create connection
    $conn = mysqli_connect($servername, $username, $db_password, $dbname);

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // prepare SQL statement and bind parameters
    $stmt = $conn->prepare("SELECT id, password FROM user WHERE email = ?");
    $stmt->bind_param("s", $email);

    // execute the SQL statement and check for errors
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    // retrieve the user's ID and password hash from the database
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();

    // verify the password hash
    if (password_verify($password, $hashed_password)) {
        // password is correct, log the user in
        session_start();
        $_SESSION['id'] = $id;
        header("Location: http://localhost/isik/index.php"); // replace with your own URL
        exit();
    } else {
        // password is incorrect, set error message
        $error = "Invalid email or password";
    }

    // close the database connection and statement
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

<nav class="px-2 border-gray-200 sm:px-0 py-8 bg-white">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="../../../index.php" class="flex items-center">
        <img src="../../img\logos\isik\banner.png" class=" h-16 mr-3 sm:max-h-20" alt="isi kef logo" />
        <span class="self-center text-xl font-semibold whitespace-nowrap "></span>
    </a>
    <button data-collapse-toggle="navbar-multi-level" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-multi-level" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white ">

        <li>
          <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Notre Institut <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
          <!-- Dropdown menu 0 -->
          <div  class="dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
              <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Présentation</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Mot du Directeur</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Galerie</a>
                </li>
              </ul>
          </div>
      </li>
      <li>
        <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">Nos formations <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
        <!-- Dropdown menu 1 -->
        <div  class="dropdown-menu hidden absolute  font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
            <ul class="py-2 text-sm text-gray-700 bottom-7" aria-labelledby="dropdownLargeButton">
              <li aria-labelledby="dropdownNavbarLink">
                <button data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class="subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Licence<svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                <div  class="subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 left-full top-0">
                    <ul class="py-2 text-sm text-gray-700 " aria-labelledby="doubleDropdownButton">
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">LCS</a>
                      </li>
                      <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">LCE</a>
                      </li>

                    </ul>
                </div>
              </li>
              <li aria-labelledby="dropdownNavbarLink" >
                <button  data-dropdown-toggle="doubleDropdown" data-dropdown-placement="right-start" type="button" class=" subdropdown-btn flex items-center justify-between w-full px-4 py-2 hover:bg-gray-100 ">Mastère
                  <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></button>
                  <div class="relative">
                    <div class="subdropdown-menu hidden absolute z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                      <ul class="py-2 text-sm text-gray-700" aria-labelledby="doubleDropdownButton">
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">SIW</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">ASRI</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">AWI</a>
                        </li>
                        <li>
                          <a href="#" class="block px-4 py-2 hover:bg-gray-100">NTICDIA</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  
                  
              </li>
            </ul>
        </div>
    </li>
    <li>
      <button  data-dropdown-toggle="dropdownNavbar" class="dropdown-btn flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto ">La vie de l'Institut <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
      <!-- Dropdown menu 0 -->
      <div  class="dropdown-menu absolute hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow">
          <ul class="py-2 text-sm text-gray-700 " aria-labelledby="dropdownLargeButton">
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Les Clubs</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Centre 4C </a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Projet Erasmus+</a>
            </li>
            <li>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100 ">Bibliothèque</a>
            </li>
          </ul>
      </div>
  </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Actualités et Evénements</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Nous Contacter</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
  
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

<footer class="bg-white">
  <div class="mx-auto w-full p-4 sm:p-6 ">
      <div class="md:flex md:justify-between">
        <div class="mb-6 md:mb-0">
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-800">Institut Supérieur d'Informatique du Kef</span>
                <div >5 Rue Saleh Ayech - 7100 Kef <br>
                  Tél.: (216) 78 201 056 - Fax : (216) 78 200 237
                  </div>
        </div>
        <div class="grid grid-cols-3 sm:gap-2 sm:grid-cols-6 text-center">
            <div class="">
                <a href="" class="mb-4 text-sm font-semibold text-gray-900">Actualités et Evénements</a>
            </div>
            <div class="">
                <a href="" class="mb-4 text-sm font-semibold text-gray-900 ">FAQ</a>
            </div>
            <div class="">
                <a href="" class="mb-4 text-sm font-semibold text-gray-900 ">Liens Utiles</a>
            </div>
            <div class="">
              <a href="" class="mb-4 text-sm font-semibold text-gray-900 ">Media Room</a>
          </div>
          <div class="">
              <a href="" class="mb-4 text-sm font-semibold text-gray-900 ">Sondage</a>
          </div>
          <div class="">
              <a href="" class="mb-4 text-sm font-semibold text-gray-900 ">Nous Contacter</a>
          </div>
        </div>
    </div>
    <hr class="my-6 border-gray-200 sm:mx-auto  lg:my-8" />
    <div class="sm:flex sm:items-center sm:justify-between">
        <span class="text-sm text-gray-500 sm:text-center ">© 2023 <a href="/" class="hover:underline">ISIKEF</a>. Tous droits réservés.
        </span>
        <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
            <a href="https://www.facebook.com/profile.php?id=100057592473413" class="text-gray-500 hover:text-gray-900 ">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                <span class="sr-only">Facebook page</span>
            </a>

        </div>
    </div>
  </div>
</footer>

<script src="../../js/app.js"></script>
</body>
</html>
