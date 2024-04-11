<?php
    session_start();
    include_once "php/config.php";
    $myfriend=$_GET['reject'];
    $me= $_SESSION["unique_id"];
    $query = mysqli_query($conn,"DELETE FROM follow_rq WHERE follow_send_id = '$follower_id' AND follow_reciv_id = '$following_id'");
    {
    echo "<script type=\"text/javascript\">
                        alert(\"friend request deleted\");
                        window.location='profile.php';
                    </script>";
    }
?>