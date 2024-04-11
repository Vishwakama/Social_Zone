<?php 
session_start();
include_once "php/config.php";
if(!isset($_SESSION['admin_unique_id'])){
  header("location: login.php");
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
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <a href="home.php" class="text-decoration-none" title="">
                <span><img src="images/icon1.png" alt=""></span>
                Home
            </a>
        </li>
        <li>
            <a href="#" class="text-decoration-none" title="">
                <span><img src="images/icon3.png" alt=""></span>
                Posts
            </a>
        </li>
        <li>
            <a href="users.php" title="" class="not-box-openm text-decoration-none">
                <span><img src="images/icon6.png" alt=""></span>
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
                <li><a href="home.php" title="">Home Page</a></li>
                <li><a href="new-profiles.php" title="">New Friends</a></li>
            </ul>
        <h3>Account Setting</h3>
            <ul class="us-links">
            <?php 
                $sql1 = mysqli_query($conn, "SELECT * FROM private_account WHERE account_id = {$_SESSION['admin_unique_id']}");
                if(mysqli_num_rows($sql1) > 0){
                    $row1 = mysqli_fetch_assoc($sql1);
                    echo"
                    <li><a href='private_account.php?accnt_id=".$row['admin_unique_id']."' title=''>Regular Account</a></li>
                    <li><a href='' title=''><font color='red'>Delete Account</font></a></li>";

                }
                else{
                    echo"<li><a href='private_account.php?accnt_id=".$row['admin_unique_id']."' title=''>Private Account</a></li>
                    <li><a href='' title=''><font color='red'>Delete Account</font></a></li>";
                }
            ?>
            </ul>
        <h3>Setting</h3>
            <ul class="us-links">
                <?php echo"<li><a href='edit_profile.php?fn=$row[admin_fname]&ln=$row[admin_lname]&id=$row[admin_unique_id]&pn=$row[admin_phone]' title=''>Edit Profile</a></li>"; ?>
                <li><a href="#" title="">Privacy</a></li>
                <li><a href="#" title="">Faqs</a></li>
                <li><a href="#" title="">Terms & Conditions</a></li>
            </ul>
        <h3 class="tc"><a href="php/logout.php?logout_id=<?php echo $row['admin_unique_id']; ?>" title="">Logout</a></h3>
    </div>
</div>
</div>
</div>
</header>
<section class="cover-sec">
    <img src="images/cover-img.jpg" alt="">
    <div class="add-pic-box">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12 col-sm-12">
                    <input type="file" id="file">
                    <label for="file">Change Image</label>
                </div>
            </div>
        </div>
    </div>
</section>
<main>
<div class="main-section">
<div class="container">
<div class="main-section-data">
<?php 
    $sql = mysqli_query($conn, "SELECT * FROM admin_dtls WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }
?>
    <div class="row">
    <div class="col-lg-3">
        <div class="main-left-sidebar">
            <div class="user_profile">
                <?php
                $sql2 = mysqli_query($conn, "SELECT * FROM admin_profile_pic WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
                if(mysqli_num_rows($sql2) > 0){
                    $row2 = mysqli_fetch_assoc($sql2);
                    echo"
                    <div class='user-pro-img'>
                        <img src='".$row2['admin_image']."' alt=''>
                    </div>";
                }
                else{
                    echo"
                    <div class='user-pro-img'>
                        <img src='images/user3.jpg' alt=''>
                    </div>";
                }
                ?>
                <div class="user_pro">
                    <div class="post-st">
                        <ul>
                            <li><a class="post_project" href="#" title=""><i class="fa fa-camera"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="user_pro_status">
                    <ul class="flw-status">
                        <?php
                            $admin_id = $_SESSION['admin_unique_id'];
                            $query = "SELECT COUNT(follower_id) FROM follow_system WHERE following_id = '$admin_id'";
                            $result = mysqli_query($conn,$query);
                            $rowcount = mysqli_fetch_array($result);
                        ?>
                        <li>
                            <a href="follower_list.php" class="text-decoration-none"><span>Followers</span></a>
                            <b><?php echo $rowcount['0']; ?></b>
                        </li>
                        <li>
                        <?php
                            $admin_id = $_SESSION['admin_unique_id'];
                            $query1 = "SELECT COUNT(following_id) FROM follow_system WHERE follower_id = '$admin_id'";
                            $result1 = mysqli_query($conn,$query1);
                            $rowcount1 = mysqli_fetch_array($result1);
                        ?>
                            <a href="following_list.php" class="text-decoration-none"><span>Followings</span></a>
                            <b><?php echo $rowcount1['0'];  ?></b>
                        </li>
                    </ul>
                </div>
                <?php
                $admin_id = $_SESSION['admin_unique_id'];
                $query = mysqli_query($conn,"SELECT * FROM `admin_link` WHERE admin_unique_id = '$admin_id'");
                $count = mysqli_num_rows($query);
                $totals = mysqli_fetch_assoc($query);
                if($totals>0)
                {
                    echo"
                    <ul class='social_links'>
                        <li><i class='fab fa-facebook-square'></i>".$totals['facebook_id']."</li>
                        <li><i class='fab fa-twitter-square'></i>".$totals['twitter_id']."</li>
                        <li><i class='fab fa-instagram'></i>".$totals['instagram_id']."</li>
                        <li><i class='fab fa-youtube'></i>".$totals['youtube_id']."</li>
                    </ul>
                    ";
                }
                else
                {
                    echo"
                    <form action='' method='GET'>
                        <ul class='social_links'>
                            <li><i class='fab fa-facebook-square'></i><input type='text' name='facebook' placeholder='Facebook id..'></li>
                            <li><i class='fab fa-twitter-square'></i><input type='text' name='twitter' placeholder='Twitter id..'></li>
                            <li><i class='fab fa-instagram'></i><input type='text' name='instagram' placeholder='Instagram id..'></li>
                            <li><i class='fab fa-youtube'></i><input type='text' name='youtube' placeholder='Youtube id..'></li>
                            <li><input type='submit' name='submit' value='Update Links'></li>
                        </ul>
                    </form>
                    ";
                    if(isset($_GET['submit']))
                    {
                        $facebook_id = $_GET['facebook'];
                        $twitter_id = $_GET['twitter'];
                        $instagram_id = $_GET['instagram'];
                        $youtube_id = $_GET['youtube'];
                        $query5 = mysqli_query($conn,"INSERT INTO `admin_link` VALUES ('','$facebook_id','$twitter_id','$instagram_id','$youtube_id','$admin_id')");
                        if($query5)
                        {
                            header('location:profile.php');
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    
<div class='col-lg-6'>
<div class='main-ws-sec'>
    <div class='user-tab-sec'>
        <h3><?php echo $row['admin_fname']." ".$row['admin_lname'] ?></h3>
        <div class='star-descp'>
            <?php 
                $admin_id = $_SESSION['admin_unique_id'];
                $sql1 = mysqli_query($conn, "SELECT * FROM admin_bio_info WHERE admin_unique_id = {$_SESSION['admin_unique_id']}");
                if(mysqli_num_rows($sql1) > 0){
                    $row1 = mysqli_fetch_assoc($sql1);
                    echo"<span>".$row1['admin_profession']."</span>";
                }
                else{
                    echo"<div id='show'><button>Add profession<i class='la la-plus'></i></button></div>
                    <div class='menu' style='display: none; margin-top:2px;'>
                        <form action='' method='get'>
                            <input type='text' name='profession'  placeholder='Your profession'>
                            <input type='submit' name='submit' value='Update Profession'>
                        </form>
                    </div>";
                    $admin_id = $_SESSION['admin_unique_id'];
                    if(isset($_GET['submit']))
                    {
                        $profession = $_GET['profession'];
                        $query = mysqli_query($conn,"INSERT INTO admin_bio_info VALUES ('','$admin_id','$profession')");
                        if($query)
                        {
                            echo "<script>window.location ='profile.php'</script>";
                        }
                        else
                        {
                            echo"Problem in submittion";
                        }
                    }
                }
            ?>
            
        </div>
        <div class='tab-feed'>
            <ul>
                <li data-tab='feed-dd' class='active'>
                    <a href='#' title='' class='text-decoration-none'>
                        <img src='images/ic1.png' alt=''>
                        <span>Feed</span>
                    </a>
                </li>
                <li data-tab='info-dd'>
                    <a href='#' title='' class='text-decoration-none'>
                        <img src='images/ic2.png' alt=''>
                        <span>Info</span>
                    </a>
                </li>
                <li data-tab='portfolio-dd'>
                    <a href='#' title='' class='text-decoration-none'>
                        <img src='images/ic3.png' alt=''>
                        <span>Portfolio</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<!--YAha Post suru--->
<?php
    $admin_id = $_SESSION['admin_unique_id'];
    $query = mysqli_query($conn, "SELECT * FROM `admin_post` WHERE admin_unique_id = '$admin_id' ORDER BY `post_id` DESC") or die(mysqli_error());
    $total = mysqli_num_rows($query);
    while($fetch = mysqli_fetch_array($query))
    {
        $action = $fetch['post_action'];
        if($action=='3')
        {
            $query1 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE `admin_unique_id` = '$admin_id'");
            $row3 = mysqli_fetch_assoc($query1);
?>
    <div class="product-feed-tab current" id="feed-dd">
    <div class="posts-section">
    <div class="post-bar">
        <div class="post_topbar">
            <div class='usy-dt'>
                <?php
                
                $query3 = mysqli_query($conn,"SELECT * FROM `admin_thumbnail_pic` WHERE `admin_unique_id` = '$admin_id'");
                $row4 = mysqli_fetch_assoc($query3);
                $totle3 = mysqli_num_rows($query3);
                if($totle3>0)
                {
                    echo"<img src='".$row4['admin_image']."' height='50' width='50' alt=''>";
                }
                else
                {
                    echo"<img src='images/user3.jpg' height='40' alt=''>";
                }
                ?>
                <div class='usy-name'>
                    <h3><?php echo $row3['admin_fname']." ".$row3['admin_lname']; ?></h3>
                    <span><img src='images/clock.png' alt=''>3:30</span>
                </div>
            </div>
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <li><a href="#" title="">Edit Post</a></li>
                    <li><?php echo"<a href='delete_post.php?id=$fetch[post_id]' title=''>Delete</a>"; ?></li>
                </ul>
            </div>
        </div>
        <div class="job_descp">
            <h3><?php echo $fetch['post_title']?></h3>
            <video width="100%" height="240" controls>
                <source src="<?php echo $fetch['post']?>">
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
                        <img src='images/liked-img.png' alt=''>
                        <span>".$rowcount1['0']."</span>
                        ";
                    }
                    else
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href='like_button.php?l_id=$fetch[post_id]'><i class='fas fa-heart'></i>Like</a>
                        <img src='images/liked-img.png' alt=''>
                        <span>".$rowcount1['0']."</span>";
                    }
                    ?>
                </li>
            </ul>
        </div>
        </div>
        
    </div>
    </div>   
<?php
    }
    elseif($action=='1')
    {
        $query1 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE `admin_unique_id` = '$admin_id'");
        $row3 = mysqli_fetch_assoc($query1);
?>
    <div class="product-feed-tab current" id="feed-dd">
    <div class="posts-section">
    <div class="post-bar">
        <div class="post_topbar">
            <div class='usy-dt'>
                <?php
                
                $query3 = mysqli_query($conn,"SELECT * FROM `admin_thumbnail_pic` WHERE `admin_unique_id` = '$admin_id'");
                $row4 = mysqli_fetch_assoc($query3);
                $totle3 = mysqli_num_rows($query3);
                if($totle3>0)
                {
                    echo"<img src='".$row4['admin_image']."' height='50' width='50' alt=''>";
                }
                else
                {
                    echo"<img src='images/user3.jpg' height='40' alt=''>";
                }
                ?>
                <div class='usy-name'>
                    <h3><?php echo $row3['admin_fname']." ".$row3['admin_lname']; ?></h3>
                    <span><img src='images/clock.png' alt=''>3:30</span>
                </div>
            </div>
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <li><a href="#" title="">Edit Post</a></li>
                    <li><?php echo"<a href='delete_post.php?id=$fetch[post_id]' title=''>Delete</a>"; ?></li>
                </ul>
            </div>
        </div>
        <div class="job_descp">
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
                        <img src='images/liked-img.png' alt=''>
                        <span>".$rowcount1['0']."</span>
                        ";
                    }
                    else
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href='like_button.php?l_id=$fetch[post_id]'><i class='fas fa-heart'></i>Like</a>
                        <img src='images/liked-img.png' alt=''>
                        <span>".$rowcount1['0']."</span>";
                    }
                    ?>
                </li>
            </ul>
        </div>
        </div>
        
    </div>
    </div>   
<?php
    }
    else
        {
            $query1 = mysqli_query($conn,"SELECT * FROM `admin_dtls` WHERE `admin_unique_id` = '$admin_id'");
            $row3 = mysqli_fetch_assoc($query1);
?>
    <div class="product-feed-tab current" id="feed-dd">
    <div class="posts-section">
    <div class="post-bar">
        <div class="post_topbar">
            <div class='usy-dt'>
                <?php
                
                $query3 = mysqli_query($conn,"SELECT * FROM `admin_thumbnail_pic` WHERE `admin_unique_id` = '$admin_id'");
                $row4 = mysqli_fetch_assoc($query3);
                $totle3 = mysqli_num_rows($query3);
                if($totle3>0)
                {
                    echo"<img src='".$row4['admin_image']."' height='50' width='50' alt=''>";
                }
                else
                {
                    echo"<img src='images/user3.jpg' height='40' alt=''>";
                }
                ?>
                <div class='usy-name'>
                    <h3><?php echo $row3['admin_fname']." ".$row3['admin_lname']; ?></h3>
                    <span><img src='images/clock.png' alt=''>3:30</span>
                </div>
            </div>
            <div class="ed-opts">
                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                <ul class="ed-options">
                    <li><a href="#" title="">Edit Post</a></li>
                    <li><?php echo"<a href='delete_post.php?id=$fetch[post_id]' title=''>Delete</a>"; ?></li>
                </ul>
            </div>
        </div>
        <div class="job_descp">
            <h3><?php echo $fetch['post_title']; ?></h3>
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
                        <img src='images/liked-img.png' alt=''>
                        <span>".$rowcount1['0']."</span>
                        ";
                    }
                    else
                    {
                        $result1 = mysqli_query($conn,"SELECT COUNT(like_id) FROM `post_likes` WHERE like_post_id = '$post_id'");
                        $rowcount1 = mysqli_fetch_array($result1);
                        echo "<a href='like_button.php?l_id=$fetch[post_id]'><i class='fas fa-heart'></i>Like</a>
                        <img src='images/liked-img.png' alt=''>
                        <span>".$rowcount1['0']."</span>";
                    }
                    ?>
                </li>
            </ul>
        </div>
        </div>
        
    </div>
    </div>   
<?php
    }
}
?>
<!--Yaha Post khatam-->
<div class="product-feed-tab" id="info-dd">
    <?php
    $sql1 = mysqli_query($conn, "SELECT * FROM admin_info WHERE admin_unique_id = {$_SESSION['admin_unique_id']}");
    if(mysqli_num_rows($sql1) > 0){
        $row1 = mysqli_fetch_assoc($sql1);
    echo"
    <div class='user-profile-ov'>
        <h3>Overview</h3>
        <p>".$row1['admin_info_overview']."<p>
    </div>
    <div class='user-profile-ov st2'>
        <h3>Experience</h3>
        <p>".$row1['admin_info_experience']."<p>
    </div>
    <div class='user-profile-ov'>
        <h3>Education</h3>
        <p>".$row1['admin_info_education']."<p>
    </div>
    <div class='user-profile-ov'>
        <h3>Location</h3>
        <p>".$row1['admin_info_location']."<p>
    </div>
    <div class='user-profile-ov'>
        <h3>Skills</h3>
        <p>".$row1['admin_info_skills']."<p>
    </div>";
    }
    else{
        echo"
        <span><a href='edit_admin_dtls.php'>Insert your Details</a></span>
        <div class='user-profile-ov'>
            <h3>Overview</h3>
        </div>
        <div class='user-profile-ov st2'>
            <h3>Experience</h3>
        </div>
        <div class='user-profile-ov'>
            <h3>Education</h3>
        </div>
        <div class='user-profile-ov'>
            <h3>Location</h3>
        </div>
        <div class='user-profile-ov'>
            <h3>Skills</h3>
        </div>";
    }
    ?>
</div>
<div class="product-feed-tab" id="portfolio-dd">
    <div class="portfolio-gallery-sec">
    <h3>Portfolio</h3>
        <div class="gallery_pf">
            <div class='row'>
        <?php
        $admin_id = $_SESSION['admin_unique_id'];
        $query2 = mysqli_query($conn,"SELECT * FROM `admin_post` WHERE admin_unique_id='$admin_id' ORDER BY `post_id` DESC");
        $total9 = mysqli_num_rows($query2);
        if($total9>0)
        {
            while($row = mysqli_fetch_assoc($query2))
            {
                $action = $row['post_action'];
                if($action=='2')
                {
                    echo"
                    <div class='col-lg-4 col-md-4 col-sm-6 col-6'>
                        <div class='gallery_pt'>
                            <img src='".$row['post']."' alt=''>
                            <a href='#' title=''><img src='images/all-out.png' alt=''></a>
                            <p>".$row['post_desc']."</p>
                        </div>
                    </div>";
                }
                elseif($action=='3')
                {
                    echo"
                    <div class='col-lg-4 col-md-4 col-sm-6 col-6'>
                        <div class='gallery_pt'>
                            <video width='100%' height='140' controls>
                                <source src='".$row['post']."'>
                            </video>
                            <a href='#' title=''><img src='images/all-out.png' alt=''></a>
                            <p>".$row['post_desc']."</p>
                        </div>
                    </div>";
                }
                else
                {
                    echo "<p>You do not have uploaded any photo or Video</p>";
                }
            }
        }
        else
        {
            echo"<p>You don't have any photos</p>";
        }
        ?> 
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="post-popup pst-pj">
<div class="post-project">
    <h3>Update Profile Picture</h3>
    <div class="post-project-fields">
        <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-12">
                    <img src="images/user3.jpg" onClick="triggerClick()" id="profileDisplay" style="height:200px; width:200px; border-radius:50%;" id="profileImage" required name="image">
                    <p>Chose an image</p>
                    <input type="file" name="profileImage" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;">
                        <div class="invalid-feedback">
                            Please Chose an Image.
                        </div>
                </div>
                <div class="col-lg-12">
                    <ul>
                        <li><button class="active" type="submit" name="submit" value="post">Update</button></li>
                        <li><a href="#" title="">Cancel</a></li>
                    </ul>
                </div>
                <!--
                    
            -->
            </div>
        </form>
    </div>
    <a href="#" title=""><i class="la la-times-circle-o"></i></a>
</div>
</div>
<div class="col-lg-3">
<div class="right-sidebar">
<div class="message-btn">
    <a href="users.php" title="" class="text-decoration-none"><i class="fa fa-envelope"></i> Message</a>
</div>
<div class="widget widget-portfolio">
    <div class="wd-heady">
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
                             <span>Graphic Designer</span>
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
                             <span>Graphic Designer</span>
                         </div>
                         <span><a href='follow_rq.php?rec=$row5[admin_unique_id]'><i class='la la-plus'></i></a></span>
                     </div>";
                 }
             }
         }
   ?>
</div>
</div>
<div class="widget widget-portfolio">
    <?php
    $query = mysqli_query($conn,"SELECT * FROM `private_account` WHERE account_id='{$_SESSION['admin_unique_id']}'");
    $total = mysqli_num_rows($query);
    if($total >0)
    {
        
        $row1 = mysqli_fetch_assoc($query);
        $account_id = $row1['account_id'];
        $query1 = mysqli_query($conn,"SELECT * FROM follow_rq WHERE follow_reciv_id='$account_id'");
        $total1 = mysqli_num_rows($query1);
        if($total1 >0)
        {
            $result = mysqli_fetch_assoc($query1);
            $follow_req_id = $result['follow_send_id'];
            $query1 = mysqli_query($conn,"SELECT * FROM admin_dtls WHERE admin_unique_id='$follow_req_id'");
            $total1 = mysqli_num_rows($query1);
            while($result = mysqli_fetch_assoc($query1))
            {
                echo"
                <div class='wd-heady'>
                    <h3>Follow requests</h3>
                   </div>
                    <div class='suggestions-list'>
                    <div class='suggestion-usd'>
                        <img src='images/user3.jpg' height='40' width='40' alt=''>
                        <div class='sgt-text'>
                            <h4>".$result['admin_fname']." ".$result['admin_lname']."</h4>
                            <span>Graphic Designer</span>
                        </div>
                        <span><a href='delete_follow_rq.php?followerid=$result[admin_unique_id]'><i class='la la-minus'></i></a></span>
                        <span><a href='accpt_follow_rq.php?followerid=$result[admin_unique_id]'><i class='la la-plus'></i></a></span>
                    </div>
                    ";
            }
        }
    }
    else
    {

    }
        
    ?>
    
</div>
</div>
</main>
<footer>
    <div class="footy-sec mn no-margin">
        <div class="container">
            <ul>
                <li><a href="help-center.html" title="">Help Center</a></li>
                <li><a href="about.html" title="">About</a></li>
                <li><a href="#" title="">Privacy Policy</a></li>
                <li><a href="#" title="">Community Guidelines</a></li>
                <li><a href="#" title="">Cookies Policy</a></li>
                <li><a href="#" title="">Career</a></li>
                <li><a href="forum.html" title="">Forum</a></li>
                <li><a href="#" title="">Language</a></li>
                <li><a href="#" title="">Copyright Policy</a></li>
            </ul>
            <p><img src="images/copy-icon2.png" alt="">Copyright 2019</p>
            <img class="fl-rgt" src="social-zone-logo.png-small.png" height="35" alt="">
        </div>
    </div>
</footer>
</div>
    <script>
	function triggerClick(e) {
  	document.querySelector('#profileImage').click();
	}
	function displayImage(e) {
  	if (e.files[0]) {
    	var reader = new FileReader();
    	reader.onload = function(e){
   	   document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
   		}
    	reader.readAsDataURL(e.files[0]);
  		}
	}
    $(document).ready(function(){
        $('#show').click(function() {
        $('.menu').toggle("slide");
        });
    });
    </script>
    <script type="text/javascript" src="font-awesome/js/all.js"></script>
    <script type="text/javascript" src="font-awesome/js/all.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>