<?php
	date_default_timezone_set('Asia/Manila');
    session_start();
	require_once 'php/config.php';
	/*require_once 'functions.php';	

	if(ISSET($_POST['submit']))
	{
        $admin_id = $_SESSION['admin_unique_id'];
		$action = $_POST['action'];

		if($action==3)
		{
			$title = $_POST['videotitle'];
			$file_name = $_FILES['videoFile']['name'];
			$file_temp = $_FILES['videoFile']['tmp_name'];
			$file_size = $_FILES['videoFile']['size'];
			$description = $_POST['videoText'];

			if($file_size < 50000000)
			{
				$file = explode('.', $file_name);
				$end = end($file);
				$allowed_ext = array('avi', 'flv', 'wmv', 'mov', 'mp4');
				if(in_array($end, $allowed_ext))
				{
					$name = date("Ymd").time();
					$location = 'video/'.$name.".".$end;
					if(move_uploaded_file($file_temp, $location))
					{
						mysqli_query($conn, "INSERT INTO `admin_post` VALUES ('', '$title', '$location','$description','$admin_id',current_timestamp(),'$action')") or die(mysqli_error());
						echo "<script>alert('Video Uploaded')</script>";
						echo "<script>window.location = 'home.php'</script>";
					}
				}
				else
				{
					echo "<script>alert('Wrong video format')</script>";
					echo "<script>window.location = 'home.php'</script>";
				}
			}
			else
			{
				echo "<script>alert('File too large to upload')</script>";
				echo "<script>window.location = 'home.php'</script>";
			}
		}
		if($action==2)
		{
			/*$output['status']=FALSE;
			set_time_limit(0);
			$allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
			if ($_FILES['imageFile']["error"] > 0) 
			{
				$output['error']= "File Error";
			}
			elseif (!in_array($_FILES['imageFile']["type"], $allowedImageType)) 
			{
				$output['error']= "Invalid image format";
			} 
			else 
			{
				$temp_path = $_FILES['imageFile']['tmp_name'];
				$file = pathinfo($_FILES['imageFile']['name']);
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
				$post_desc = $_POST['imgtype'];
				/*$name = $_FILES['imageFile']['name'];
				$target_dir = "post_img/";
				$target_file = $target_dir . basename($_FILES["imageFile"]["name"]);
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$extensions_arr = array("jpg","jpeg","png","gif");
				if( in_array($imageFileType,$extensions_arr) ){
					if(move_uploaded_file($_FILES['imageFile']['tmp_name'],$target_dir.$name))
					{
						$query = "INSERT INTO admin_post VALUES ('','','$large_thumbnail','$post_desc','$admin_id',current_timestamp(),'$action')";
						mysqli_query($conn,$query);
						header('location:home.php');
						//echo json_encode($output);
					//}
			}

			
			$countfiles = count($_FILES['files']['name']);
			
			// Looping all files
			for($i=0;$i<$countfiles;$i++){
			$filename = $_FILES['files']['name'][$i];
			
			// Upload file
			move_uploaded_file($_FILES['files']['tmp_name'][$i],'images/'.$filename);
				
		 	}
		}
		else
		{
			$post_title = $_POST['posttitle'];
			$post_des = $_POST['postText'];
			if($post_des=='')
			{
				echo "<script>alert('Please fill the text.')</script>";
				echo "<script>window.location = 'home.php'</script>";
			}
			else
			{
				$query = mysqli_query($conn,"INSERT INTO `admin_post` VALUES ('','$post_title','','$post_des','$admin_id',current_timestamp(),'$action')");
				if($query)
				{
					echo "<script>window.location = 'home.php'</script>";
				}
				else
				{
					echo "<script>alert('Problem with your text.')</script>";
					echo "<script>window.location = 'home.php'</script>";
				}
			}
		}
	}
    else{
        echo"Error in there";
    }*/
	
	/* Check connection*/
	function compressImage($path, $destination, $quality) {

		$info = getimagesize($path);
	  
		if ($info['mime'] == 'image/jpeg') 
		  $image = imagecreatefromjpeg($path);
	  
		elseif ($info['mime'] == 'image/gif') 
		  $image = imagecreatefromgif($path);
	  
		elseif ($info['mime'] == 'image/png') 
		  $image = imagecreatefrompng($path);
	  
		imagejpeg($image, $destination, $quality);
	  
	  }
	$admin_id = $_SESSION['admin_unique_id'];
  if($_FILES['file']['name'] != ''){

  	$file_names = '';

  	$total = count($_FILES['file']['name']);

  	for($i=0; $i<$total; $i++){
  		$filename = $_FILES['file']['name'][$i]; // Get the Uploaded file Name.
		  $tmp_name = $_FILES['file']['tmp_name'][$i]; 
  		$extension = pathinfo($filename,PATHINFO_EXTENSION); //Get the Extension of uploded file

  		$valid_extensions = array("png","jpg","jpeg");

  		if(in_array($extension, $valid_extensions)){ // check if upload file is a valid image file.
  			$new_name = rand() . ".". $extension;
  			$path = "images/" . $new_name;
			compressImage($tmp_name,$path,60);
  			//move_uploaded_file($_FILES['file']['tmp_name'][$i], $path);

  			$file_names .= $path . " | ";
  		}else{
  			echo 'false';
  		}
  	}
	  
	  
    $postName= $_POST['postName'];
    // Save uploaded images name on database
  	$sql = "INSERT INTO admin_post VALUES('','','{$file_names}','{$postName}','$admin_id',current_timestamp(),'1')";
  	if(mysqli_query($conn,$sql)){
  		echo 'true';
  	}else{
  		echo 'false';
  	}
  }
  
?>