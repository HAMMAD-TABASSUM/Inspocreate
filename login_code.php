<?php

require_once('connection.php');
session_start();
$email = $password = $pwd = '';
$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result))
    {
        $id = $row["id"];
        $email = $row["email"];
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['email'] = $email;
    }
    header("Location: activity.php");
}else{
    echo "Invalid email or password";
}
?>