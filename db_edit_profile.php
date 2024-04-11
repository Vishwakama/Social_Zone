<?php
    session_start();
    include_once "php/config.php";
    $admin_id = $_SESSION['admin_unique_id'];
    if(isset($_GET['submit']))
    {
        $first_name = $_GET['firstname'];
        $last_name = $_GET['lastname'];
        $phone = $_GET['phone'];

        $query = "UPDATE `admin_dtls` SET `admin_fname` = '$first_name', `admin_lname` = '$last_name', `admin_phone` = '$phone' WHERE `admin_dtls`.`admin_unique_id` = '$admin_id'";
        $total = mysqli_query($conn,$query);
        if($total)
        {
            echo"Record Updated";
            header('location:profile.php');
        }
        else
        {
            echo"Problem in insertion";
        }
    }
    
    ?>