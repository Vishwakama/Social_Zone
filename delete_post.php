<?php
    session_start();
    include_once "php/config.php";
    $query = mysqli_query($conn,"DELETE FROM admin_post WHERE post_id = '". $_GET['id']."'");
    {
		echo "<script type=\"text/javascript\">
                alert(\"Post has been remove\");
                window.location='profile.php';
            </script>";
	}
	
	?>r