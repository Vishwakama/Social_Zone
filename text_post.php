<?php
session_start();
include('php/config.php');
$admin_id = $_SESSION['admin_unique_id'];

if(isset($_GET['submit']))
{
    $post_title = $_GET['posttitle'];
    $post_text = $_GET['postText'];

    $query = mysqli_query($conn,"INSERT INTO admin_post VALUES('','$post_title','$post_text','','$admin_id',current_timestamp(),'2')");
    if($query)
    {
        header('location:home.php');
    }
    else
    {
        //echo "<script>alert('Problem with your text.')</script>";
		//echo "<script>window.location = 'home.php'</script>";
    }
}
/*
         $img = $fetch['post']; 
         $img=ltrim($img,'|');
         if(!empty($img))
         {
             $imgs=explode('|',$img);
             if(is_array($imgs)>0 && count($imgs)>0)
             {
                 foreach($imgs as $img)
                 {
                     echo $img.'<br>';
                 }
             }
             
         }*/


?>