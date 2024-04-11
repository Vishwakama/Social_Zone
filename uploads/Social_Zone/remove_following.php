<?php
    session_start();
    include_once "php/config.php";
    $query = mysqli_query($conn,"delete from follow_system WHERE follower_id = '". $_SESSION["admin_unique_id"]."' AND following_id = '". $_GET['id']."'");
    {
		echo "<script type=\"text/javascript\">
                alert(\"User has been remove\");
                window.location='following_list.php';
            </script>";
	}
	
	?>