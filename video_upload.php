<?php

session_start();
require_once 'php/config.php';
$admin_id = $_SESSION['admin_unique_id'];
if($_FILES['file']['name'] != ''){

    $file_names = '';

    $total = count($_FILES['file']['name']);

        $filename = $_FILES['file']['name']; // Get the Uploaded file Name.
        $extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file

        $valid_extensions = array("mp4");

        if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
            $new_name = rand() . ".". $extension;
            $path = "video/" . $new_name;

            move_uploaded_file($_FILES['file']['tmp_name'], $path);

            $file_names = $path;
        }else{
            echo 'false';
        }
  $videoName= $_POST['video_name'];
  // Save uploaded images name on database
    $sql = "INSERT INTO admin_post VALUES('','','{$file_names}','{$videoName}','$admin_id',current_timestamp(),'3')";
    if(mysqli_query($conn,$sql)){
        echo 'true';
    }else{
        echo 'false';
    }
}


?>