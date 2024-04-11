<?php 
  session_start();
  include_once "php/config.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <title>Social Zone</title>
    <style>
        body{
            background-color:#f6f6fb;
            /*Button Color: 5108f6*/
            font-family: Century Gothic;
        }
        .container-update{
            width: 320px;
            height: 530px;
            background-color: White;
            border-radius: 15px;
        }
        input[type=email]{
            border-color: #cbb5fd;
            width: 290px;
            margin-top: 10px;
            border-width: 2px;
            margin-top:25px;
        }
        input[type=tel]{
            border-color: #cbb5fd;
            width: 290px;
            margin-top: 10px;
            border-width: 2px;
            margin-top:25px;
        }
        input[type=text]{
            border-color: #cbb5fd;
            width: 290px;
            margin-top: 10px;
            border-width: 2px;
            margin-top:25px;
        }
        input[type=password]{
            border-color: #cbb5fd;
            width: 290px;
            border-width: 2px;
            margin-top:25px;

        }
        .form-submit{
            background-color: #7640f8;
            width: 150px;
            height: 35px;
            margin-top: 10px;
            border-radius: 5px;
            color: white;
        }
        
    </style>
</head>
<body>
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
            <input type="" name="search" placeholder="Search...">
            <button type="submit"><i class="la la-search"></i></button>
        </form>
    </div>
    <nav>
    <ul>
        <li>
            <a href="home.php" title="">
                <span><img src="images/icon1.png" alt=""></span>
                Home
            </a>
        </li>
        <li>
            <a href="#" title="">
                <span><img src="images/icon3.png" alt=""></span>
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
            <a href="users.php" title="" class="not-box-openm">
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
            <a href="#" title=""><?php echo $row['admin_fname']; ?></a>
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
                    <li><a href='' title=''>Delete Account</a></li>";
                }
                else{
                    echo"<li><a href='private_account.php?accnt_id=".$row['admin_unique_id']."' title=''>Private Account</a></li>
                    <li><a href='' title=''>Delete Account</a></li>";
                }
            ?>
            </ul>
        <h3>Setting</h3>
            <ul class="us-links">
                <?php echo"<li><a href='edit_profile.php?fn=$row[admin_fname]&ln=$row[admin_lname]&id=$row[admin_unique_id]&ad=$row[admin_address]&pn=$row[admin_phone]' title=''>Edit Profile</a></li>"; ?>
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
    <section class="update form" align="center">
        <form align="center" class="mt-5" action="db_edit_profile.php" method="GET" id="">
            <div class="container" align="center">
                <h4 class="mt-3">Update Details</h4>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" name="firstname" id="firstname" required="" value="<?php echo $_GET['fn']; ?>">
                </div>
                <div class="mb-3 mt-3">
                    <input type="text" class="form-control" name="lastname" id="lastname" required="" value="<?php echo $_GET['ln']; ?>">
                </div>
                <div class="mb-3 mt-3">
                    <input type="tel" class="form-control" id="phone" name="phone" required="" value="<?php echo $_GET['pn']; ?>">
                </div>
                <div class="field button mb-3 mt-3">
                    <input type="submit" name="submit" id="Update Details" class="form-submit" value="Update Details" />
                </div>
            </div>
        </form>
    </section>
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>