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
    <link rel="stylesheet" type="text/css" href="css/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="line-awesome/css/line-awesome.css">
    <link rel="stylesheet" type="text/css" href="css/line-awesome-font-awesome.min.css">
    <link href="font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="responsive.css">
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
                $sql3 = mysqli_query($conn, "SELECT * FROM `admin_profile_pic` WHERE `admin_unique_id` = {$_SESSION['admin_unique_id']}");
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
<section class="companies-info">
<div class="container">
    <div class="company-title">
        <h3>Your Following</h3>
    </div>
    <div class="companies-list">
        <div class="row">
        <?php
        $admin_id = $_SESSION['admin_unique_id'];
        $query = mysqli_query($conn,"SELECT * FROM follow_system WHERE follower_id='$admin_id'");
        $total = mysqli_num_rows($query);
        if($total!=0)
        {
            while($row = mysqli_fetch_array($query)){
                $follower_id = $row['following_id'];
                $followers = mysqli_query($conn,"SELECT * FROM admin_dtls WHERE admin_unique_id = '$follower_id'")or die(mysql_error());
				$myfollower = mysqli_fetch_array($followers);
                if($myfollower) 
                {
                    $query4 = mysqli_query($conn,"SELECT * FROM `admin_thumbnail_pic` WHERE admin_unique_id = '$follower_id'");
                    $row = mysqli_fetch_assoc($query4);
                    $total = mysqli_num_rows($query4);
                    if($total>0)
                    {
                        echo"
                        <div class='col-lg-3 col-md-4 col-sm-6 col-12'>
                            <div class='company_profile_info'>
                                <div class='company-up-info'>
                                <img src='".$row['admin_image']."' alt='' width='100'>
                                <h3>".$myfollower['admin_fname']." ".$myfollower['admin_lname']."</h3>
                                <h4>Graphic Designer</h4>
                                <ul>
                                    <li><a href='#' title='' class='follow'>Followers</a></li>
                                    <li><a href='chat.php?user_id=$myfollower[admin_unique_id]' title='' class='message-us'><i class='fa fa-envelope'></i></a></li>
                                    <li><a href='#' title='' class='follow'>Following</a></li>
                                </ul>
                                <ul>
                                    <li><a href='remove_following.php?id=$myfollower[admin_unique_id]' title='' class='hire-us mt-3'>Remove</a></li>
                                </ul>
                                </div>
                                <a href='#' title='' class='view-more-pro'>View Profile</a>
                            </div>
                        </div>";
                    }
                    else
                    {
                        echo"
                        <div class='col-lg-3 col-md-4 col-sm-6 col-12'>
                            <div class='company_profile_info'>
                                <div class='company-up-info'>
                                <img src='images/user3.jpg' alt=''>
                                <h3>".$myfollower['admin_fname']." ".$myfollower['admin_lname']."</h3>
                                <h4>Graphic Designer</h4>
                                <ul>
                                    <li><a href='#' title='' class='follow'>Followers</a></li>
                                    <li><a href='chat.php?user_id=$myfollower[admin_unique_id]' title='' class='message-us'><i class='fa fa-envelope'></i></a></li>
                                    <li><a href='#' title='' class='follow'>Following</a></li>
                                </ul>
                                <ul>
                                    <li><a href='remove_following.php?id=$myfollower[admin_unique_id]' title='' class='hire-us mt-3'>Remove</a></li>
                                </ul>
                                </div>
                                <a href='#' title='' class='view-more-pro'>View Profile</a>
                            </div>
                        </div>";
                    }
                }
            }
        }
        else
        {
            echo"<h4 align='center'>
                your don't have followings    
            </h4>";
        }
        ?>
        </div>
    </div>
</div>
</section>
</div>
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>