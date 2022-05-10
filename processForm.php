<?php
$msg = "";
$css_class = "";

require_once('connection.php');

session_start();

if (isset($_POST['save-user'])) {
    
    $bio = $_POST['bio'];
    $blog = $_POST['blog'];
    $profileImageName = $_FILES['profileImage']['name'];

    $target = 'images/' . $profileImageName;

   if (move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)) {
    
    $id = $_SESSION['id'];
    $sql = "UPDATE users SET profile_image=\"{$profileImageName}\", bio=\"{$bio}\", blog=\"{$blog}\" WHERE id={$id}";

    if (mysqli_query($conn, $sql)) {
        echo $id;
        header("Location: intrest.php");
    }

   }

}
?>