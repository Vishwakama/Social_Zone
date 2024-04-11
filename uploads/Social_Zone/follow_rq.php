<?php
    session_start();
    include_once "php/config.php";
    $sender =  $_SESSION['admin_unique_id'];
    $receiver = $_GET['rec'];
    $query1 = "SELECT * FROM private_account WHERE account_id = '$receiver'";
    $query = mysqli_query($conn,$query1);
    if(mysqli_num_rows($query) > 0)
    {
        $query = mysqli_query($conn,"SELECT * FROM follow_system WHERE `follower_id`='$sender' AND `following_id`='$receiver'");
        if(mysqli_num_rows($query) > 0){
            echo"<script type=\"text/javascript\">
            alert(\"This user is already in your follow list.\");
            window.location='profile.php';
            </script>
            ";   
        }
        else{
            $row = mysqli_fetch_array($query);
            $query = mysqli_query($conn,"SELECT * FROM follow_rq WHERE `follow_send_id`='$sender' AND `follow_reciv_id`='$receiver'");
            if(mysqli_num_rows($query) > 0){
            $row = mysqli_fetch_array($query);
            echo"
                <script type=\"text/javascript\">
                alert(\"This account is private Your follow request is already send\");
                window.location='profile.php';
                </script>
                ";
            }
            else{
                mysqli_query($conn,"INSERT INTO follow_rq(follow_send_id,follow_reciv_id) VALUES('$sender','$receiver') ") or
                die(mysqli_error());
                {
                echo "
                    <script type=\"text/javascript\">
                    alert(\"This account is private. Follow request sent\");
                    window.location='profile.php';
                    </script>";
                }
            }
        }
        /**/
    }
	else
    {
        $query = mysqli_query($conn,"SELECT * FROM follow_system WHERE `follower_id`='$sender' AND `following_id`='$receiver'");
        if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_array($query);
        echo"
            <script type=\"text/javascript\">
            alert(\"You are already in follower list of this user.\");
            window.location='profile.php';
            </script>
            ";
        }
        else{
            $query = mysqli_query($conn,"INSERT INTO follow_system (follower_id,following_id) VALUES('$sender','$receiver') ") or
            die(mysqli_error());
            echo $query;
            
            {
                header('location:home.php');
            }
        }
    }
?>