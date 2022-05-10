<?php
$msg = "";
$css_class = "";

require_once('connection.php');
session_start();

// post image

if (isset($_POST['save-user'])) {
    
    $tital = $_POST['tital'];
    $category = $_POST['category'];
    $discription = $_POST['discription'];
    // $tags = implode(",", $_POST['tags']);
    $tags = $_POST['tags'];
    $tags;
    $postImageName = $_FILES['postImage']['name'];
    $addCollection = $_POST['addCollection'];
    $Public = $_POST['Public'];
    $Public = $_POST['Public'];
    $like = $_POST['like'];
    $target = 'images/' . $postImageName;
    $collection;
    if($addCollection == "on"){
        $collection = 1;
    }else{
        $collection = 0;
    }
    $publics;
    if($Public == "on"){
        $publics = 1;
    }else{
        $publics = 0;
    }
    $publics;
    if($likes == "on"){
        $like = 1;
    }else{
        $like = 0;
    }
   if (move_uploaded_file($_FILES['postImage']['tmp_name'],$target)) {
    
    $usid = $_SESSION['id'];
    $sql = "INSERT INTO post (post_image,tital,category,discription,collection,public,usid,is_like) VALUES ('$postImageName','$tital','$category','$discription','$collection','$publics','$usid','$like')";

    if (mysqli_query($conn, $sql)) {
        echo $usid;
        header("Location: activity.php");
    }

   }

}

// post video

if (isset($_POST['save-user'])) {
    
    $tital = $_POST['tital'];
    $category = $_POST['category'];
    $discription = $_POST['discription'];
    // $tagss = implode(",", $_POST['tags']);
    $postVideoName = $_FILES['postVideo']['name'];
    $addCollection = $_POST['addCollection'];
    $Public = $_POST['Public'];
    $Public = $_POST['Public'];
    $like = $_POST['like'];
    $target = 'images/' . $postVideoName;
    $collection;
    if($addCollection == "on"){
        $collection = 1;
    }else{
        $collection = 0;
    }
    $publics;
    if($Public == "on"){
        $publics = 1;
    }else{
        $publics = 0;
    }
    $publics;
    if($likes == "on"){
        $like = 1;
    }else{
        $like = 0;
    }
   if (move_uploaded_file($_FILES['postVideo']['tmp_name'],$target)) {
    
    $usid = $_SESSION['id'];
    $sql = "INSERT INTO post (post_video,tital,category,discription,collection,public,usid,is_like) VALUES ('$postVideoName','$tital','$category','$discription','$collection','$publics','$usid','$like')";

    if (mysqli_query($conn, $sql)) {
        echo $usid;
        header("Location: activity.php");
    }

   }

}
?>