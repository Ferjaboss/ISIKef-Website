<?php
// get the form inputs
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$user_type = $_POST['user_type'];
$email = $_POST['email'];
$password = $_POST['password'];
$avatar = $_FILES['avatar']['name'];

// hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// insert the user data into the database
$servername = "localhost";
$username = "root";
$db_password = ""; // Use a different variable name for MySQL password
$dbname = "isik";

// create connection
$conn = mysqli_connect($servername, $username, $db_password, $dbname);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// upload the avatar file to the server
if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
    // Get the uploaded file and move it to the avatars folder
    $timestamp = time();
    $avatarFile = $_FILES['avatar']['tmp_name'];
    $avatarName = $_FILES['avatar']['name'];
    $avatarName = $timestamp . '_' . $avatarName;
    $avatarPath = 'avatars/' . $avatarName;
    
    if (!move_uploaded_file($avatarFile, $avatarPath)) {
        die('Error uploading file');
    }
    $avatar = $avatarName;
} else {
    $avatarName = "/default.png";
}
if(isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar']['name'];
    // rest of the code that uses $avatar variable
} else {
    $avatarName= "/avatars/default.png";
    // handle the case where no file was uploaded for the avatar field
}
// prepare SQL statement and bind parameters
$stmt = $conn->prepare("INSERT INTO user (id, nom, prenom, user_type, email, password, avatar) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issssss", $id, $nom, $prenom, $user_type, $email, $hashed_password, $avatarName);

// execute the SQL statement and check for errors
if ($stmt->execute()) {
    echo "New user created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// close the database connection and statement
$stmt->close();
$conn->close();

// redirect user to a success page
header("Location: http://localhost/isik");
exit();
?>