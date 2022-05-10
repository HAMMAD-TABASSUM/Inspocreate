<?php
	require_once('connection.php');
	session_start();
	if(isset($_POST['submit']))
	{
		$tags = implode(",", $_POST['prodname']);
		$id = $_SESSION['id'];
		$insertqry="UPDATE users SET tag=\"{$tags}\"  WHERE id={$id}";
		echo $insertqry;
		$insertqry=mysqli_query($conn,$insertqry);
	}
	header('Location: follow.php');
?>