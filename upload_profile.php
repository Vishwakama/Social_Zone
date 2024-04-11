<?php
    session_start();
    include_once('functions.php');
   include('php/config.php');
   $sessin_id = $_SESSION['admin_unique_id'];
    if($_POST['submit'])
    {
        $output['status']=FALSE;
        set_time_limit(0);
        $allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
        if ($_FILES['profileImage']["error"] > 0) 
        {
            $output['error']= "File Error";
        }
        elseif (!in_array($_FILES['profileImage']["type"], $allowedImageType)) 
        {
            $output['error']= "Invalid image format";
        } 
        else 
        {
            $temp_path = $_FILES['profileImage']['tmp_name'];
            $file = pathinfo($_FILES['profileImage']['name']);
            $fileType = $file["extension"];
            $fileName = rand(222, 888) . time() . ".$fileType";
            
            $small_thumbnail_path = "uploads/small/";
            createFolder($small_thumbnail_path);
            $small_thumbnail = $small_thumbnail_path . $fileName;
            
            $medium_thumbnail_path = "uploads/medium/";
            createFolder($medium_thumbnail_path);
            $medium_thumbnail = $medium_thumbnail_path . $fileName;
            
            $large_thumbnail_path = "uploads/large/";
            createFolder($large_thumbnail_path);
            $large_thumbnail = $large_thumbnail_path . $fileName;
            
            $thumb1 = createThumbnail($temp_path, $small_thumbnail,$fileType, 150, 93);
            $thumb2 = createThumbnail($temp_path, $medium_thumbnail, $fileType, 300, 185);
            $thumb3 = createThumbnail($temp_path, $large_thumbnail,$fileType, 550, 340);
                    
            if($thumb1 && $thumb2 && $thumb3) {
                $output['status']=TRUE;
                $output['small']= $small_thumbnail;
                $output['medium']= $medium_thumbnail;
                $output['large']= $large_thumbnail;
            }
        
            $query = mysqli_query($conn,"SELECT * FROM admin_profile_pic WHERE `admin_unique_id`='$sessin_id'");
            if(mysqli_num_rows($query) > 0)
            {
                /*$filename = $_FILES["profileImage"]["name"];
                $tempname = $_FILES["profileImage"]["tmp_name"];
                $folder = "images/".$filename;
                move_uploaded_file($tempname,$folder);*/

                $query = "UPDATE `admin_profile_pic` SET `admin_image` = '$large_thumbnail' WHERE `admin_profile_pic`.`admin_unique_id` = '$sessin_id'";
                $data = mysqli_query($conn, $query);
                if($data)
                {
                    mysqli_query($conn,"UPDATE `admin_thumbnail_pic` SET `admin_image` = '$small_thumbnail' WHERE `admin_thumbnail_pic`.`admin_unique_id` = '$sessin_id'");
                    echo "Complete";
                    header('location:profile.php');
                }
                else
                {
                    echo"Proble";
                    header('location:profile.php');
                    echo"Problem in insertion";
                }
            }
            else
            {
                /*$filename = $_FILES["profileImage"]["name"];
                $tempname = $_FILES["profileImage"]["tmp_name"];
                $folder = "images/".$filename;
                move_uploaded_file($tempname,$folder);*/

                $query = "INSERT INTO admin_profile_pic VALUES('','$sessin_id','$large_thumbnail')";
                $data = mysqli_query($conn, $query);
                if($data)
                {
                    $query = mysqli_query($conn,"INSERT INTO `admin_thumbnail_pic` VALUES('','$small_thumbnail','$sessin_id')");
                    #echo "INSERT INTO `admin_thumbnail_pic` VALUES('','$small_thumbnail','$sessin_id')";
                    header('location:profile.php');
                }
                else
                {
                    header('location:profile.php');
                    echo"Problem in insertion";
                }
            }
        }
        header('location:profile.php');
    }
?>