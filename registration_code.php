<?php
require_once('connection.php');
$fname = $lname = $email = $password = $pwd = '';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pwd = $_POST['password'];
$password = MD5($pwd);

$sql = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
$result = mysqli_query($conn, $sql);
if($result){
	$s = "SELECT * from users where email='$email'";
	$res = mysqli_query($conn, $s);
	if ($res){
		if(mysqli_num_rows($res) > 0){
			while($row = mysqli_fetch_assoc($res))
			{
				$id = $row["id"];
				$email = $row["email"];
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['id'] = $id;
				$_SESSION['email'] = $email;
			}
			header("Location: about.php");
		}else{
			echo "Invalid email or password";
		}
	}
	
}

?>