<?php 
include_once "php/config.php";
session_start();
if(!isset($_SESSION['admin_unique_id'])){
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Social Zone</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="stylesheet" type="text/css" href="animate.css">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="line-awesome/css/line-awesome.css">
        <link rel="stylesheet" type="text/css" href="line-awesome/css/line-awesome-font-awesome.min.css">
        <link href="font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="slick/slick/slick.css">
        <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        <!--link rel="stylesheet" href="dropzone/css/dropzone.css"-->
        <link rel="stylesheet" type="text/css" href="responsive.css">
        <!--<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <script src="vendor/jquery/jquery.form.min.js"></script>-->
        <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/popper.js"></script>
    </head>
<body>
<div class="wrapper">
<header>
<div class="container">
    <div class="header-data">
        <?php  
            $sql = mysqli_query($conn, "SELECT * FROM `admin_dtls` WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
            }
        ?>
    <div class="logo">
        <a href="home.html" title=""><img src="social-zone-logo.png-small.png" alt=""></a>
    </div>
    <div class="search-bar">
        <form>
            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><i class="la la-search"></i></button>
        </form>
    </div>
    <nav>
    <ul>
        <li>
            <a href="profile.php" class="text-decoration-none" title="">
                <span><img src="" alt=""></span>
                Profile
            </a>
        </li>
        <li>
            <a href="#" title="" class="text-decoration-none">
                <span><img src="" alt=""></span>
                Posts
            </a>
        </li>
        <!--<li>
            <a href="profiles.html" title="">
                <span><img src="images/icon4.png" alt=""></span>
                Profiles
                </a>
            <ul>
                <li><a href="user-profile.html" title="">User Profile</a></li>
                <li><a href="my-profile-feed.html" title="">my-profile-feed</a></li>
            </ul>
        </li>-->
        <li>
            <a href="users.php" title="" class="not-box-openm text-decoration-none">
                <span><img src="" alt=""></span>
                Chat
            </a>
        </li>
    </ul>
    </nav>
    <div class="menu-btn">
        <a href="#" title=""><i class="fa fa-bars"></i></a>
    </div>
    <div class="user-account">
        <div class="user-info">
            <?php  
                $sql3 = mysqli_query($conn, "SELECT * FROM `admin_thumbnail_pic` WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
                if(mysqli_num_rows($sql3) > 0){
                    $row3 = mysqli_fetch_assoc($sql3);
                    echo"<img src=".$row3['admin_image']." height='30' width='40' alt=''>";
                }
                else
                {
                    echo"<img src='images/user3.jpg' height='' alt=''>";
                }
            ?>
            <a href="#" class="text-decoration-none" title=""><?php echo $row['admin_fname']; ?></a>
        </div>
    <div class="user-account-settingss">        
        <h3>Pages</h3>
            <ul class="us-links">
                <li><a href="home.php" class="text-decoration-none" title="">Home Page</a></li>
                <li><a href="new-profiles.php" class="text-decoration-none" title="">New Friends</a></li>
            </ul>
        <h3>Account Setting</h3>
            <ul class="us-links">
            <?php 
                $sql1 = mysqli_query($conn, "SELECT * FROM private_account WHERE account_id = {$_SESSION['admin_unique_id']}");
                if(mysqli_num_rows($sql1) > 0){
                    $row1 = mysqli_fetch_assoc($sql1);
                    echo"
                    <li><a class='text-decoration-none' href='private_account.php?accnt_id=".$row['admin_unique_id']."' title=''><font color='green'>Regular Account</font></a></li>
                    <li><a class='text-decoration-none' href='' title=''><font color='red'>Delete Account</font></a></li>";
                }
                else{
                    echo"
                    <li><a class='text-decoration-none' href='private_account.php?accnt_id=".$row['admin_unique_id']."' title=''><font color='red'>Private Account</font></a></li>
                    <li><a class='text-decoration-none' href='' title=''><font color='red'>Delete Account</font></a></li>";
                }
            ?>
            </ul>
        <h3>Setting</h3>
            <ul class="us-links">
                <?php echo"<li><a class='text-decoration-none' href='edit_profile.php?fn=$row[admin_fname]&ln=$row[admin_lname]&id=$row[admin_unique_id]&pn=$row[admin_phone]' title=''>Edit Profile</a></li>"; ?>
                <li><a href="#" class='text-decoration-none' title="">Privacy</a></li>
                <li><a href="#" class='text-decoration-none' title="">Faqs</a></li>
                <li><a href="#" class='text-decoration-none' title="">Terms & Conditions</a></li>
            </ul>
        <h3 class="tc"><a href="php/logout.php?logout_id=<?php echo $row['admin_unique_id']; ?>" title="">Logout</a></h3>
    </div>
</div>
</div>
</header>
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<div class="row">
<div class="col-lg-3 col-md-4 pd-left-none no-pd">
<div class="main-left-sidebar no-margin">
<div class="user-data full-width">
<div class="user-profile">
<div class="username-dt">
    <?php
    $admin_id = $_SESSION['admin_unique_id'];
    $sql1 = mysqli_query($conn, "SELECT * FROM `admin_thumbnail_pic` WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
    if(mysqli_num_rows($sql1) > 0){
        $row1 = mysqli_fetch_assoc($sql1);
        echo"
        <div class='usr-pic'>
            <img src='".$row1['admin_image']."' alt='' height='110'>
        </div>";
        $sql1 = mysqli_query($conn, "SELECT * FROM `admin_bio_info` WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
        /*SELECT `admin_dtls`.`admin_fname`, `admin_dtls`.`admin_lname`, `admin_bio_info`.`admin_profession` FROM `admin_dtls`, `admin_bio_info` WHERE `admin_dtls`.`admin_unique_id`=`admin_bio_info`.`admin_unique_id` AND `admin_dtls`.`admin_unique_id` = {$_SESSION['admin_unique_id']}"*/
        if(mysqli_num_rows($sql1) > 0){
            $row2 = mysqli_fetch_assoc($sql1);
            echo"
            </div>
                <div class='user-specs'>
                    <h3>".$row['admin_fname']." ".$row['admin_lname']."</h3>
                    <span>".$row2['admin_profession']."</span>
                </div>
            </div>";
        }
        else
        {
            echo"
            </div>
                <div class='user-specs'>
                    <h3>".$row['admin_fname']." ".$row['admin_lname']."</h3>
                    <span>Not Mentioned</span>
                </div>
            </div>";
        }
    }
    else
    {
        echo"
        <div class='usr-pic'>
            <img src='images/user3.jpg' alt='' height='110'>
        </div>";
        $sql1 = mysqli_query($conn, "SELECT * FROM `admin_bio_info` WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
        /*SELECT `admin_dtls`.`admin_fname`, `admin_dtls`.`admin_lname`, `admin_bio_info`.`admin_profession` FROM `admin_dtls`, `admin_bio_info` WHERE `admin_dtls`.`admin_unique_id`=`admin_bio_info`.`admin_unique_id` AND `admin_dtls`.`admin_unique_id` = {$_SESSION['admin_unique_id']}"*/
        if(mysqli_num_rows($sql1) > 0){
            $row2 = mysqli_fetch_assoc($sql1);
            echo"
            </div>
                <div class='user-specs'>
                    <h3>".$row['admin_fname']." ".$row['admin_lname']."</h3>
                    <span>".$row2['admin_profession']."</span>
                </div>
            </div>";
        }
        else
        {
            echo"
            </div>
                <div class='user-specs'>
                    <h3>".$row['admin_fname']." ".$row['admin_lname']."</h3>
                    <span>Not Mentioned</span>
                </div>
            </div>";
        }
    }
    ?>
        <!--</div>
            <div class='user-specs'>
                <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                <span>".$row1['admin_profession']."</span>
            </div>
        </div>-->
    
    <ul class="user-fw-status">
        <li>
            <?php
            $admin_id = $_SESSION['admin_unique_id'];
            $query1 = "SELECT COUNT(following_id) FROM follow_system WHERE follower_id = '$admin_id'";
            $result1 = mysqli_query($conn,$query1);
            $rowcount1 = mysqli_fetch_array($result1);
            
            ?>
            <a href="following_list.php" class="text-decoration-none"><h4>Following</h4></a>
            <span><?php echo $rowcount1['0'];  ?></span>
        </li>
        <li>
        <?php
            $admin_id = $_SESSION['admin_unique_id'];
            $query = "SELECT COUNT(follower_id) FROM follow_system WHERE following_id = '$admin_id'";
            $result = mysqli_query($conn,$query);
            $rowcount = mysqli_fetch_array($result);
            
            ?>
            <a href="follower_list.php" class="text-decoration-none"><h4>Follower</h4></a>
            <span><?php echo $rowcount['0'];  ?></span>
        </li>
        <li>
            <a href="profile.php" title="" class="text-decoration-none">View Profile</a>
        </li>
    </ul>
</div>
</div>
</div>
<div class="col-lg-6 col-md-8 no-pd">
<div class="main-ws-sec">
    <div class="post-topbar">
            <div class="row inputSection">
                <div class="col-md-12 mt-2 p-0" id="Menu2">
                    <div id="main">
                        <div id="content">
                            <form class="dropzone" id="file_upload"></form>
                            <input type="text" name="post_name" id="post_name" class="form-control mt-2" placeholder="Write something???">
                            <button class="btn btn-secondary mt-2" id="upload_btn">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2 p-0" id="Menu3" style="display:none;">
                    <div id="main">
                        <div id="content">
                            <form class="dropzone" id="video_upload"></form>
                            <input type="text" name="video_name" id="video_name" class="form-control mt-2" placeholder="Write something???">
                            <button class="btn btn-secondary mt-2" id="video_upload_btn">Upload</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-2 p-0" style="display:none;" id="Menu1">
                    <form action="text_post.php" method="GET">
                        <input type="text" class="form-control postInput" name="posttitle" id="posttitle" placeholder="Title">
                        <textarea name="postText" id="postText" class="form-control postInput mt-3" placeholder="What's new??" style="height: 90px;"></textarea>
                        <input class="btn btn-secondary mt-2 ml-12" type="submit" name="submit" id="submit" value="Upload">
                    </form>
                </div>
            </div>
            <div class="row mt-2 justify-content-between">
                <div class="col-md-6 ps-0 col-9">
                    <button class="btn btn-secondary me-2" onclick="toggleVisibility('Menu2');" type="button" id="uploadImageBtn"><i class="fas fa-images"></i></button>
                    <button class="btn btn-secondary me-2" onclick="toggleVisibility('Menu3');" type="button" id="uploadPostBtn"><i class="fas fa-video"></i></i></button>
                    <button class="btn btn-secondary me-2" onclick="toggleVisibility('Menu1');" type="button" id="uploadPostBtn"><i class="fas fa-file-alt"></i></button>
                </div>
                
            </div>
        </div>
<div class="posts-section">
<div class="post-bar">
    <?php
    //Ye jiska account hai uska post ke liye hai yaha se video start hui hai.
    $admin_id = $_SESSION['admin_unique_id'];
    $query = mysqli_query($conn, "SELECT * FROM `admin_post` WHERE admin_unique_id = '$admin_id' ORDER BY `post_id` DESC limit 1 ") or die(mysqli_error());
    $total9 = mysqli_num_rows($query);
    if($total9>0)
    {
    while($fetch = mysqli_fetch_array($query))
    { 
        $action = $fetch['post_action'];
        if($action=='1')
        {
    ?>  
    <div class="post_topbar">
        <?php
        $query2 = mysqli_query($conn,"SELECT * FROM `admin_profile_pic` WHERE admin_unique_id='$admin_id'");
        $total4 = mysqli_num_rows($query2);
        if($total4>0)
        {
            while($row = mysqli_fetch_array($query2))
            {
                $query9 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id = '$admin_id'");
                $row1 = mysqli_fetch_assoc($query9);
                echo"
                <div class='usy-dt'>
                    <img src='".$row['admin_image']."' alt='' height='40' width='50'>
                    <div class='usy-name'>
                        <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                        <span><img src='' alt=''>".$fetch['post_time']."</span>
                    </div>
                </div>
                ";
            }
        }
        else
        {
            
            $query9 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id = '$admin_id'");
            $row1 = mysqli_fetch_assoc($query9);
            echo"
            <div class='usy-dt'>
                <img src='images/user3.jpg' alt='' height='40' width='50'>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='' alt=''>".$fetch['post_time']."</span>
                </div>
            </div>
            ";
        }
        
        ?>
        <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
        </div>
    </div>
    <div class="epi-sec">
        <ul class="descp">
            <li><img src="" alt=""><span></span></li>
            <li><img src="" alt=""><span>India</span></li>
        </ul>
    </div>
    <div class="job_descp">
        <h3><?php echo $fetch['post_title']?></h3>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $img = $fetch['post']; 
            $img=rtrim($img,'|');

            if(!empty($img))
            {
                $imgs=explode('|',$img);
                if(is_array($imgs)>0 && count($imgs)>0)
                {
                    foreach($imgs as $key=>$img)
                    {
                        $img=trim($img);
                        if(!empty($img))
                        {
                            $cls=($key==0) ? 'active' : '';
                            echo"
                            <div class='carousel-item ".$cls."'>
                                <img src='".$img."' class='d-block w-100' alt='...'>
                            </div>
                            ";
                        }
                    }
                }
                
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <p><?php echo $fetch['post_desc']; ?></p>
    </div>
    <div class="job-status-bar">
        <ul class="like-com">
            <li>
                <?php
                
                $post_id = $fetch['post_id'];
                $admin_id = $_SESSION['admin_unique_id'];
                $query2 = "SELECT * FROM `post_likes` WHERE like_post_id = '$post_id' AND like_admin_id = '$admin_id'";
                $run = mysqli_query($conn,$query2);
                $total = mysqli_fetch_array($run);
                if($total>0)
                {
                    $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                    $rowcount1 = mysqli_fetch_array($result1);
                    echo "<a href=''><i class='fas fa-heart'></i>Like</a>
                    <img src='' alt=''>
                    <span>".$rowcount1['0']."</span>
                    ";
                }
                else
                {
                    $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                    $rowcount1 = mysqli_fetch_array($result1);
                    echo "<a href='like_button.php?l_id=$fetch[post_id]'><i class='fas fa-heart'></i>Like</a>
                    <img src='' alt=''>
                    <span>".$rowcount1['0']."</span>";
                }
                ?>
            </li>
        </ul>
    </div>
    <?php
        }
        elseif($action=='3')
        {
    ?>  
    <div class="post_topbar">
        <?php
        $query2 = mysqli_query($conn,"SELECT * FROM `admin_profile_pic` WHERE admin_unique_id='$admin_id'");
        $total4 = mysqli_num_rows($query2);
        if($total4>0)
        {
            while($row = mysqli_fetch_array($query2))
            {
                $query9 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id = '$admin_id'");
                $row1 = mysqli_fetch_assoc($query9);
                echo"
                <div class='usy-dt'>
                    <img src='".$row['admin_image']."' alt='' height='40' width='50'>
                    <div class='usy-name'>
                        <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                        <span><img src='' alt=''>".$fetch['post_time']."</span>
                    </div>
                </div>
                ";
            }
        }
        else
        {
            while($row = mysqli_fetch_array($query2))
            {
                $query9 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id = '$admin_id'");
                $row1 = mysqli_fetch_assoc($query9);
                echo"
                <div class='usy-dt'>
                    <img src='images/user3.jpg' alt='' height='40' width='50'>
                    <div class='usy-name'>
                        <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                        <span><img src='' alt=''>".$fetch['post_time']."</span>
                    </div>
                </div>
                ";
            }
        }
        ?>
        <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
        </div>
    </div>
    <div class="epi-sec">
        <ul class="descp">
            <li><img src="" alt=""><span></span></li>
            <li><img src="" alt=""><span>India</span></li>
        </ul>
    </div>
    <div class="job_descp">
        <video width='100%' height='240' controls>
            <source src='<?php echo $fetch['post']; ?>'>
        </video>
        <p><?php echo $fetch['post_desc']; ?></p>
    </div>
    <div class="job-status-bar">
        <ul class="like-com">
            <li>
                <?php
                
                $post_id = $fetch['post_id'];
                $admin_id = $_SESSION['admin_unique_id'];
                $query2 = "SELECT * FROM `post_likes` WHERE like_post_id = '$post_id' AND like_admin_id = '$admin_id'";
                $run = mysqli_query($conn,$query2);
                $total = mysqli_fetch_array($run);
                if($total>0)
                {
                    $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                    $rowcount1 = mysqli_fetch_array($result1);
                    echo "<a href=''><i class='fas fa-heart'></i>Like</a>
                    <img src='' alt=''>
                    <span>".$rowcount1['0']."</span>
                    ";
                }
                else
                {
                    $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                    $rowcount1 = mysqli_fetch_array($result1);
                    echo "<a href='like_button.php?l_id=$fetch[post_id]'><i class='fas fa-heart'></i>Like</a>
                    <img src='' alt=''>
                    <span>".$rowcount1['0']."</span>";
                }
                ?>
            </li>
        </ul>
    </div>
    <?php
        }
        else
        {
    ?>  
    <div class="post_topbar">
        <?php
        $query2 = mysqli_query($conn,"SELECT * FROM `admin_profile_pic` WHERE admin_unique_id='$admin_id'");
        $total4 = mysqli_num_rows($query2);
        if($total4>0)
        {
            while($row = mysqli_fetch_array($query2))
            {
                $query9 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id = '$admin_id'");
                $row1 = mysqli_fetch_assoc($query9);
                echo"
                <div class='usy-dt'>
                    <img src='".$row['admin_image']."' alt='' height='40' width='50'>
                    <div class='usy-name'>
                        <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                        <span><img src='' alt=''>".$fetch['post_time']."</span>
                    </div>
                </div>
                ";
            }
        }
        else
        {
            $query9 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id = '$admin_id'");
            $row1 = mysqli_fetch_assoc($query9);
            echo"
            <div class='usy-dt'>
                <img src='images/user3.jpg' alt='' height='40' width='50'>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='' alt=''>".$fetch['post_time']."</span>
                </div>
            </div>
            ";
        }
        ?>
        <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
        </div>
    </div>
    <div class="epi-sec">
        <ul class="descp">
            <li><img src="" alt=""><span></span></li>
            <li><img src="" alt=""><span>India</span></li>
        </ul>
    </div>
    <div class="job_descp">
        <h3><?php echo $fetch['post_title']?></h3>
        <p><?php echo $fetch['post']; ?></p>
    </div>
    <div class="job-status-bar">
        <ul class="like-com">
            <li>
                <?php
                
                $post_id = $fetch['post_id'];
                $admin_id = $_SESSION['admin_unique_id'];
                $query2 = "SELECT * FROM `post_likes` WHERE like_post_id = '$post_id' AND like_admin_id = '$admin_id'";
                $run = mysqli_query($conn,$query2);
                $total = mysqli_fetch_array($run);
                if($total>0)
                {
                    $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                    $rowcount1 = mysqli_fetch_array($result1);
                    echo "<a href=''><i class='fas fa-heart'></i>Like</a>
                    <img src='' alt=''>
                    <span>".$rowcount1['0']."</span>
                    ";
                }
                else
                {
                    $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                    $rowcount1 = mysqli_fetch_array($result1);
                    echo "<a href='like_button.php?l_id=$fetch[post_id]'><i class='fas fa-heart'></i>Like</a>
                    <img src='' alt=''>
                    <span>".$rowcount1['0']."</span>";
                }
                ?>
            </li>
        </ul>
    </div>
    <?php
        }
    }
}
else
{
    echo"Please upload a Post";
}
	?>
</div>
<div class="top-profiles">
    <div class="pf-hd">
        <h3>Posts</h3>
    </div>
</div>
<!---Yahi se start aur end hai post--->
<?php
    $query2 = mysqli_query($conn,"SELECT * FROM `admin_post` WHERE admin_unique_id in (SELECT following_id FROM follow_system WHERE follower_id = '{$_SESSION['admin_unique_id']}') or admin_unique_id in (SELECT follower_id FROM follow_system WHERE following_id = '{$_SESSION['admin_unique_id']}') ORDER BY `post_id` DESC");
    while($row = mysqli_fetch_assoc($query2))
    {
        $action = $row['post_action'];
        if($action=='3')
        {
            $admin_u_id = $row['admin_unique_id'];
        $query3 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id ='$admin_u_id'");
        $row1 = mysqli_fetch_assoc($query3)
    ?>
<div class='post-bar'>
    <div class='post_topbar'>
        <div class='usy-dt'>
            <?php
            $query3 = mysqli_query($conn,"SELECT * FROM `admin_thumbnail_pic` WHERE admin_unique_id = '$admin_u_id'");
            $total3 = mysqli_num_rows($query3);
            $row3 = mysqli_fetch_assoc($query3);
            if($total3>0)
            {
                echo"
                <img src='' alt=''>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='".$row3['admin_image']."' alt='' height='50' width='50'>".$row['post_time']."</span>
                </div>
                ";
            }
            else
            {
                echo"
                <img src='' alt=''>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='images/user3.jpg' alt='' height='50' width='50'>".$row['post_time']."</span>
                </div>
                ";
            }
            ?>
        </div>
        <div class='ed-opts'>
            <a href='#' title='' class='ed-opts-open'><i class='la la-ellipsis-v'></i></a>
            <ul class='ed-options'>
                <li><a href='#' title=''>Edit Post</a></li>
                <li><a href='#' title=''>Delete</a></li>
            </ul>
        </div>
    </div>
    <div class='epi-sec'>
        <ul class='descp'>
            <li><img src='' alt=''><span></span></li>
            <li><img src='' alt=''><span>India</span></li>
        </ul>
        <ul class='bk-links'>
            <li><a href='#' title=''><i class='la la-bookmark'></i></a></li>
            <li><a href='#' title=''><i class='la la-envelope'></i></a></li>
        </ul>
    </div>
    <div class='job_descp'>
        <h3><?php echo $row['post_title'];?></h3>
        <video width='100%' height='240' controls>
            <source src='<?php echo $row['post']; ?>'>
        </video>
        <p><?php echo $row['post_desc']; ?></p>
        </div>
    <div class='job-status-bar'>
        <ul class='like-com'>
            <li>
                <?php
                    $admin_id = $_SESSION['admin_unique_id'];
                    $post_id = $row['post_id'];
                    $query5 = "SELECT * FROM `post_likes` WHERE like_post_id = '$post_id' AND like_admin_id = '$admin_id'";
                    $total = mysqli_query($conn,$query5);
                    $semi = mysqli_num_rows($total);
                    $result3 = mysqli_fetch_assoc($total);
                    if($semi>0)
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href=''><i class='fas fa-heart'></i>Like</a>
                        <img src='' alt=''>
                        <span>".$rowcount1['0']."</span>
                        ";
                    }
                    else
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href='like_button.php?l_id=$row[post_id]'><i class='fas fa-heart'></i>Like</a>
                        <img src='' alt=''>
                        <span>".$rowcount1['0']."</span>";
                    }
                ?>
            </li>
        </ul>
    </div>
    </div>
    <?php
        }
        elseif($action=='1')
        {
        $admin_u_id = $row['admin_unique_id'];
        $query3 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id ='$admin_u_id'");
        $row1 = mysqli_fetch_assoc($query3)
    ?>
<div class='post-bar'>
    <div class='post_topbar'>
        <div class='usy-dt'>
            <?php
            $query3 = mysqli_query($conn,"SELECT * FROM `admin_thumbnail_pic` WHERE admin_unique_id = '$admin_u_id'");
            $total3 = mysqli_num_rows($query3);
            $row3 = mysqli_fetch_assoc($query3);
            if($total3>0)
            {
                echo"
                <img src='' alt=''>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='".$row3['admin_image']."' alt='' height='50' width='50'>".$row['post_time']."</span>
                </div>
                ";
            }
            else
            {
                echo"
                <img src='' alt=''>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='images/user3.jpg' alt='' height='50' width='50'>".$row['post_time']."</span>
                </div>
                ";
            }
            ?>
        </div>
        <div class='ed-opts'>
            <a href='#' title='' class='ed-opts-open'><i class='la la-ellipsis-v'></i></a>
            <ul class='ed-options'>
                <li><a href='#' title=''>Edit Post</a></li>
                <li><a href='#' title=''>Delete</a></li>
            </ul>
        </div>
    </div>
    <div class='epi-sec'>
        <ul class='descp'>
            <li><img src='' alt=''><span></span></li>
            <li><img src='' alt=''><span>India</span></li>
        </ul>
        <ul class='bk-links'>
            <li><a href='#' title=''><i class='la la-bookmark'></i></a></li>
            <li><a href='#' title=''><i class='la la-envelope'></i></a></li>
        </ul>
    </div>
    <div class='job_descp'>
    <h3><?php echo $row['post_title']?></h3>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $img = $row['post']; 
            $img=rtrim($img,'|');

            if(!empty($img))
            {
                $imgs=explode('|',$img);
                if(is_array($imgs)>0 && count($imgs)>0)
                {
                    foreach($imgs as $key=>$img)
                    {
                        $img=trim($img);
                        if(!empty($img))
                        {
                            $cls=($key==0) ? 'active' : '';
                            echo"
                            <div class='carousel-item ".$cls."'>
                                <img src='".$img."' class='d-block w-100' alt='...'>
                            </div>
                            ";
                        }
                    }
                }
                
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <p><?php echo $row['post_desc']; ?></p>
    </div>
    <div class='job-status-bar'>
        <ul class='like-com'>
            <li>
                <?php
                    $admin_id = $_SESSION['admin_unique_id'];
                    $post_id = $row['post_id'];
                    $query5 = "SELECT * FROM `post_likes` WHERE like_post_id = '$post_id' AND like_admin_id = '$admin_id'";
                    $total = mysqli_query($conn,$query5);
                    $semi = mysqli_num_rows($total);
                    $result3 = mysqli_fetch_assoc($total);
                    if($semi>0)
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href=''><i class='fas fa-heart'></i>Like</a>
                        <img src='' alt=''>
                        <span>".$rowcount1['0']."</span>
                        ";
                    }
                    else
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href='like_button.php?l_id=$row[post_id]'><i class='fas fa-heart'></i>Like</a>
                        <img src='' alt=''>
                        <span>".$rowcount1['0']."</span>";
                    }
                ?>
            </li>
            <li><a href='#' class='com'><i class='fas fa-comment-alt'></i> Comment 15</a></li>
        </ul>
    </div>
    </div>
    <?php
        }
        else
        {
        $admin_u_id = $row['admin_unique_id'];
        $query3 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE admin_unique_id ='$admin_u_id'");
        $row1 = mysqli_fetch_assoc($query3)
    ?>
<div class='post-bar'>
    <div class='post_topbar'>
        <div class='usy-dt'>
            <?php
            $query3 = mysqli_query($conn,"SELECT * FROM `admin_thumbnail_pic` WHERE admin_unique_id = '$admin_u_id'");
            $total3 = mysqli_num_rows($query3);
            $row3 = mysqli_fetch_assoc($query3);
            if($total3>0)
            {
                echo"
                <img src='' alt=''>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='".$row3['admin_image']."' alt='' height='50' width='50'>".$row['post_time']."</span>
                </div>
                ";
            }
            else
            {
                echo"
                <img src='' alt=''>
                <div class='usy-name'>
                    <h3>".$row1['admin_fname']." ".$row1['admin_lname']."</h3>
                    <span><img src='images/user3.jpg' alt='' height='50' width='50'>".$row['post_time']."</span>
                </div>
                ";
            }
            ?>
        </div>
        <div class='ed-opts'>
            <a href='#' title='' class='ed-opts-open'><i class='la la-ellipsis-v'></i></a>
            <ul class='ed-options'>
                <li><a href='#' title=''>Edit Post</a></li>
                <li><a href='#' title=''>Delete</a></li>
            </ul>
        </div>
    </div>
    <div class='epi-sec'>
        <ul class='descp'>
            <li><img src='' alt=''><span></span></li>
            <li><img src='' alt=''><span>India</span></li>
        </ul>
        <ul class='bk-links'>
            <li><a href='#' title=''><i class='la la-bookmark'></i></a></li>
            <li><a href='#' title=''><i class='la la-envelope'></i></a></li>
        </ul>
    </div>
    <div class='job_descp'>
        <h3><?php echo $row['post_title']; ?></h3>
        <p><?php echo $row['post']; ?></p>
        </div>
    <div class='job-status-bar'>
        <ul class='like-com'>
            <li>
                <?php
                    $admin_id = $_SESSION['admin_unique_id'];
                    $post_id = $row['post_id'];
                    $query5 = "SELECT * FROM `post_likes` WHERE like_post_id = '$post_id' AND like_admin_id = '$admin_id'";
                    $total = mysqli_query($conn,$query5);
                    $semi = mysqli_num_rows($total);
                    $result3 = mysqli_fetch_assoc($total);
                    if($semi>0)
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href=''><i class='fas fa-heart'></i>Like</a>
                        <img src='' alt=''>
                        <span>".$rowcount1['0']."</span>
                        ";
                    }
                    else
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href='like_button.php?l_id=$row[post_id]'><i class='fas fa-heart'></i>Like</a>
                        <img src='' alt=''>
                        <span>".$rowcount1['0']."</span>";
                    }
                ?>
            </li>
            <li><a href='#' class='com'><i class='fas fa-comment-alt'></i> Comment 15</a></li>
        </ul>
    </div>
    </div>
    <?php
            }
        }
        ?>

</div>
</div>
</div>
<div class="col-lg-3 pd-right-none no-pd">
<div class="right-sidebar">
    <div class="widget widget-about">
        <img src="social-zone-logo.png-small.png" alt="">
        <h3>Connect to world</h3>
    </div>
<div class="widget widget-jobs">
    <div class="sd-title">
    <h3>Suggestions</h3>
    </div>
    <div class="suggestions-list">
        <?php
        
                $query = "SELECT * FROM admin_dtls WHERE admin_unique_id not in(SELECT following_id FROM follow_system WHERE follower_id = '{$_SESSION['admin_unique_id']}') AND admin_unique_id != '{$_SESSION['admin_unique_id']}'";
                $result = mysqli_query($conn,$query);
                $total = mysqli_num_rows($result);
                if($total>0)
                {
                    while($row5 = mysqli_fetch_assoc($result))
                    {
                        $admin_id = $row5['admin_unique_id'];
                        $sql = "SELECT * FROM admin_thumbnail_pic WHERE admin_unique_id = $admin_id";
                        $result1 = mysqli_query($conn,$sql);
                        $total1 = mysqli_num_rows($result1);
                        $row6 = mysqli_fetch_assoc($result1);
                        if($total1>0)
                        {
                            echo"
                            <div class='suggestion-usd'>
                                <img src='".$row6['admin_image']."' height='50' width='50' alt=''>
                                <div class='sgt-text'>
                                    <h4>".$row5['admin_fname']." ".$row5['admin_lname']."</h4>
                                    <span>".$row5['admin_gender']."</span>
                                </div>
                                <span><a href='follow_rq.php?rec=$row5[admin_unique_id]'><i class='la la-plus'></i></a></span>
                            </div>";
                        }
                        else
                        {
                            echo"
                            <div class='suggestion-usd'>
                                <img src='images/user3.jpg' height='50' width='50' alt=''>
                                <div class='sgt-text'>
                                    <h4>".$row5['admin_fname']." ".$row5['admin_lname']."</h4>
                                    <span>".$row5['admin_gender']."</span>
                                </div>
                                <span><a href='follow_rq.php?rec=$row5[admin_unique_id]'><i class='la la-plus'></i></a></span>
                            </div>";
                        }
                    }
                }
                else
                {
                    echo "<p align='center'>No user for your suggestions.</p>";
                }
          
        ?>
</main>
        <script type="text/javascript">
            /*$(document).ready(function(e){
                $("form#postForm button#uploadPostBtn").click(function(e){
                    var t=$(this);
                    var inputTarget=t.attr("data-target");
                    var parent=t.parents('form');
                    if(inputTarget!='')
                    {
                        parent.find(".postInput").parent().addClass("d-none");
                        parent.find("#"+inputTarget).parent().removeClass("d-none");
                        parent.find(".postInput").val(null);
                    }
                    
                });

                $("form#postForm button#uploadImageBtn").click(function(e){
                    var t=$(this);
                    var inputTarget=t.attr("data-target");
                    var parent=t.parents('form');
                    if(inputTarget!='')
                    {
                        parent.find(".postInput").parent().addClass("d-none");
                        parent.find("#"+inputTarget).parent().removeClass("d-none");
                        parent.find(".postInput").val(null);
                    }
                    
                });
            });*/
            var divs = ["Menu1", "Menu2", "Menu3"];
                var visibleDivId = null;
                function toggleVisibility(divId) {
                if(visibleDivId === divId) {
                    //visibleDivId = null;
                } else {
                    visibleDivId = divId;
                }
                hideNonVisibleDivs();
                }
                function hideNonVisibleDivs() {
                var i, divId, div;
                for(i = 0; i < divs.length; i++) {
                    divId = divs[i];
                    div = document.getElementById(divId);
                    if(visibleDivId === divId) {
                    div.style.display = "block";
                    } else {
                    div.style.display = "none";
                    }
                }
                }
            </script>
            <script type="text/javascript">

    $(document).ready(function(){
        $(".dz-button").dropzone({ dictDefaultMessage: "Upload Image" });
      });
    $(document).ready(function(e){
        Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#file_upload", { 
      url: "post.php",
      parallelUploads: 10,
      dictDefaultMessage: "Drag Image for Upload.",
      uploadMultiple: true,
      addRemoveLinks:true,
      acceptedFiles: '.png,.jpg,.jpeg',
      autoProcessQueue: false,
      sending: function(file, xhr, formData){
          var postName=$('#post_name').val();
            formData.append('postName',postName)
       },
      successmultiple: function(file,response){
        if(response == 'true'){
          $('#content .message').hide();
          myDropzone.removeAllFiles(true); 
          $('#post_name').val('');
          alert('Images Uploaded Successfully');
        }else{
          $('#content').append('<div class="message error">Images Can\'t Uploaded.</div>');
          alert("Images Can\'t Uploaded.");
        }
      }
    });

    $('#upload_btn').click(function(){
      myDropzone.processQueue();
    });
    
});

$(document).ready(function(e){
        Dropzone.autoDiscover = false;
    var myDropzonevid = new Dropzone("#video_upload", { 
      url: "video_upload.php",
      dictDefaultMessage: "Drag or Select Video to uplaod.",
      parallelUploads: 1,
      addRemoveLinks:true,
      acceptedFiles: '.mp4',
      autoProcessQueue: false,
      sending: function(file, xhr, formData){
          var videoName=$('#video_name').val();
            formData.append('videoName',videoName)
       },
      successmultiple: function(file,response){
        if(response == 'true'){
          $('#content .message').hide();
          myDropzonevid.removeAllFiles(); 
          $('#video_name').val('');
          alert('Video Uploaded Successfully');
        }else{
          $('#content').append('<div class="message error">Video Can\'t Uploaded.</div>');
          alert("Video Can\'t Uploaded.");
        }
      }
    });

    $('#video_upload_btn').click(function(){
      myDropzonevid.processQueue();
    });
});
  </script>
  <!--script type="text/javascript" src="dropzone/js/dropzone.js"></script-->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>