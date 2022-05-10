<?php

require_once('connection.php');

$sqli_tags_post = "SELECT * FROM post";
$results_tags_post = mysqli_query($conn, $sqli_tags_post);

    if (isset($_POST['titleList'])) {
        $get_post_tital = join(",", $_POST['titleList']);
        print_r($get_post_tital);
        $get_tital_sql = "SELECT * FROM post WHERE tital LIKE ('%successfull%')";
        $get_tital_result = mysqli_query($conn, $get_tital_sql);
        echo json_encode($get_tital_result);
    } else {
        return "";
    
    }
    
?>