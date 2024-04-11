<?php
    session_start();
    include_once "php/config.php";
    $following_id= $_SESSION["admin_unique_id"];
    $follower_id=$_GET['followerid'];
    $mfriends=mysqli_query($conn,"INSERT INTO follow_system (follow_id,follower_id,following_id) VALUES('','$follower_id','$following_id') ")or die(mysql_error());
    $query = mysqli_query($conn,"DELETE FROM follow_rq WHERE follow_send_id = '$follower_id' AND follow_reciv_id = '$following_id'");
    {
    echo "<script type=\"text/javascript\">
                    alert(\"This user is now in your follower list.\");
                    window.location='profile.php';
                </script>";
    }
?>