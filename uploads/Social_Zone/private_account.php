<?php
    session_start();
    include_once "php/config.php";
    $accountid = $_GET['accnt_id'];
    $query = mysqli_query($conn,"SELECT * FROM private_account WHERE `account_id`='$accountid'");
    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_array($query);
        $query = mysqli_query($conn,"DELETE FROM private_account WHERE `account_id` = '$accountid'");
        echo"
            <script type=\"text/javascript\">
            alert(\"Your account is now No more Private Account\");
            window.location='profile.php';
            </script>
            ";
    }
    else
    {
        mysqli_query($conn,"INSERT INTO private_account (private_id ,account_id) VALUES('','$accountid')");
        echo "
            <script type=\"text/javascript\">
            alert(\"Your Account is now Private Account.\");
            window.location='profile.php';
            </script>";
    }
?>