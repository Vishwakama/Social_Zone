<?php

    session_start();
    include_once "php/config.php";
    $post_id = $_GET['l_id'];
    $admin_id = $_SESSION['admin_unique_id'];
    $query = "INSERT INTO `post_likes` VALUES ('','$post_id','$admin_id')";
    $run = mysqli_query($conn,$query);
    if($run)
    {
        header('location:home.php');
    }
    else
    {
        echo"Problem";
    }
?>