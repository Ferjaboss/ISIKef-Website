<?php
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$user_type = $_POST['user_type'];
$email = $_POST['email'];
$password = $_POST['password'];
$avatar = $_FILES['avatar']['name'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

include 'db_conn.php';

if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
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
    $avatar = "default.png";
}
$stmt = $conn->prepare("INSERT INTO user (id, nom, prenom, user_type, email, password, avatar) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $id, $nom, $prenom, $user_type, $email, $hashed_password, $avatar);

if ($stmt->execute()) {
    echo "New user created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: http://localhost/isik");
exit();
?>