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
</head>
<style>
    .form-submit{
            float: center;
            background-color: #7640f8;
            width: 150px;
            height: 35px;
            margin-top: 10px;
            border-radius: 5px;
            color: white;
        }
</style>
<body>
<div class="wrapper">
<header>
<div class="container">
<div class="header-data">
    <div class="logo">
        <a href="index.html" title=""><img src="social-zone-logo.png-small.png" alt=""></a>
    </div>
    <div class="search-bar">
        <form>
            <input type="text" name="search" placeholder="Search...">
            <button type="submit"><i class="la la-search"></i></button>
        </form>
    </div>
    <div class="menu-btn">
        <a href="#" title=""><i class="fa fa-bars"></i></a>
    </div>
    <?php 
        $sql = mysqli_query($conn, "SELECT * FROM admin_dtls WHERE admin_unique_id = {$_SESSION['admin_unique_id']}");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
        }
    ?>
<div class="user-account">
    <div class="user-info">
        <img src="images/Snapchat-1231983377.jpg" height="30" alt="">
        <a href="#" title=""><?php echo $row['admin_fname']; ?></a>
        <i class="la la-sort-down"></i>
    </div>
<div class="user-account-settingss">        
    <h3>Pages</h3>
        <ul class="us-links">
            <li><a href="home_1.php" title="">Home Page</a></li>
            <li><a href="profile.php" title="">Profile Page</a></li>
            <li><a href="new-profiles.php" title="">New Friends</a></li>
        </ul>
    <h3>Setting</h3>
    <ul class="us-links">
        <li><a href="profile-account-setting.html" title="">Account Setting</a></li>
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
    <div class="container">
        <div class="product-tab pt-5" id="info-dd">
            <form action="" method="GET">
                <div class="user-profile-ov">
                    <h3>Overview</h3>
                    <input type="text" name="Overview" class="form-control">
                </div>
                <div class="user-profile-ov st2">
                    <h3>Experience</h3>
                    <input type="text" name="Experience" class="form-control">
                </div>
                <div class="user-profile-ov">
                    <h3>Education</h3>
                    <input type="text" name="Education" class="form-control">
                </div>
                <div class="user-profile-ov">
                    <h3>Location</h3>
                    <input type="text" name="Location" class="form-control">
                </div>
                <div class="user-profile-ov">
                    <h3>Skills</h3>
                    <input type="text" name="Skills" class="form-control">
                </div>
                <div class="field button">
                    <input type="submit" name="submit" class="form-submit" value="Update Details" />
                </div>
            </form>
        </div>
        <?php
        if(isset($_GET['submit']))
        {
            $Overview = $_GET['Overview'];
            $Experience = $_GET['Experience'];
            $Education = $_GET['Education'];
            $Location = $_GET['Location'];
            $Skills = $_GET['Skills'];
            $admin_id = $_SESSION['admin_unique_id'];
            if(!empty($Overview) && !empty($Experience) && !empty($Education) && !empty($Location) && !empty($Skills) )
            {
                $query = "INSERT INTO admin_info VALUES ('','$admin_id','$Overview','$Experience','$Education','$Location','$Skills')";
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
    </div>
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
        document.querySelector('#image').click();
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