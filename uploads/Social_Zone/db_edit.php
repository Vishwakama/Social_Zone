<?php
        session_start();
        include_once "php/config.php";
        if(isset($_POST['submit']))
        {
            $profession = $_POST['profession'];
            $admin_id = $_SESSION['admin_unique_id'];
            $filename = $_FILES["profileImage"]["name"];
            $tempname = $_FILES["profileImage"]["tmp_name"];
            $folder = "Images/".$filename;
            move_uploaded_file($tempname,$folder);
            if(!empty($profession))
            {
                $query = "INSERT INTO admin_bio_info VALUES ('','$admin_id','$profession','$folder')";
                $total = mysqli_query($conn,$query);
                
                if($total)
                {
                    echo"Record Inserted";
                    header('location:profile.php');
                }
                else
                {
                    echo "<script type=\"text/javascript\">
                    alert(\"Problem with your records.\");
                    window.location='profile.php';
                    </script>";
                }
            }
            else
            {
               
            }
        }
        
        ?>