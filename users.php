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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <title>Social Zone</title>
</head>
<style>

    .users{
        padding: 25px 30px;
        }
        .users header,
        .users-list a{
        display: flex;
        align-items: center;
        padding-bottom: 20px;
        border-bottom: 1px solid #e6e6e6;
        justify-content: space-between;
        }
        .wrapper img{
        object-fit: cover;
        border-radius: 50%;
        }
        .users header img{
        height: 50px;
        width: 50px;
        }
        :is(.users, .users-list) .content{
        display: flex;
        align-items: center;
        }
        :is(.users, .users-list) .content .details{
        color: #000;
        margin-left: 20px;
        }
        :is(.users, .users-list) .details span{
        font-size: 18px;
        font-weight: 500;
        }
        .users header .logout{
        display: block;
        background: #333;
        color: #fff;
        outline: none;
        border: none;
        padding: 7px 15px;
        text-decoration: none;
        border-radius: 5px;
        font-size: 17px;
        }
        .users .search{
        margin: 20px 0;
        display: flex;
        position: relative;
        align-items: center;
        justify-content: space-between;
        }
        .users .search .text{
        font-size: 18px;
        }
        .users .search input{
        position: absolute;
        height: 42px;
        width: calc(100% - 50px);
        font-size: 16px;
        padding: 0 13px;
        border: 1px solid #e6e6e6;
        outline: none;
        border-radius: 5px 0 0 5px;
        opacity: 0;
        pointer-events: none;
        transition: all 0.2s ease;
        }
        .users .search input.show{
        opacity: 1;
        pointer-events: auto;
        }
        .users .search button{
        position: relative;
        z-index: 1;
        width: 47px;
        height: 42px;
        font-size: 17px;
        cursor: pointer;
        border: none;
        background: #fff;
        color: #333;
        outline: none;
        border-radius: 0 5px 5px 0;
        transition: all 0.2s ease;
        }
        .users .search button.active{
        background: #333;
        color: #fff;
        }
        .search button.active i::before{
        content: '\f00d';
        }
        .users-list{
        max-height: 350px;
        overflow-y: auto;
        }
        :is(.users-list, .chat-box)::-webkit-scrollbar{
        width: 0px;
        }
        .users-list a{
        padding-bottom: 10px;
        margin-bottom: 15px;
        padding-right: 15px;
        border-bottom-color: #f1f1f1;
        }
        .users-list a:last-child{
        margin-bottom: 0px;
        border-bottom: none;
        }
        .users-list a img{
        height: 40px;
        width: 40px;
        }
        .users-list a .details p{
        color: #67676a;
        }
        .users-list a .status-dot{
        font-size: 12px;
        color: #468669;
        padding-left: 10px;
        }
        .users-list a .status-dot.offline{
        color: #ccc;
        }

</style>
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
            <a href="profile.php" title="">
                <span><img src="images/icon1.png" alt=""></span>
                Profile
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
                <?php echo"<li><a href='edit_profile.php?fn=$row[admin_fname]&ln=$row[admin_lname]&id=$row[admin_unique_id]&pn=$row[admin_phone]' title=''>Edit Profile</a></li>"; ?>
                <li><a href="#" title="">Privacy</a></li>
                <li><a href="#" title="">Faqs</a></li>
                <li><a href="#" title="">Terms & Conditions</a></li>
            </ul>
        <h3 class="tc"><a href="php/logout.php?logout_id=<?php echo $row['admin_unique_id']; ?>" title="">Logout</a></h3>
    </div>
</div>
</div>
</header>
<section class="profile">
    <div class="container">
      <div class="wrapper">
        <section class="users">
        <div class="row justify-content-between  p-2" style="background: #7640f8;">
          <div class="col-md-3  col-8 text-start">
            <?php
            $sql = mysqli_query($conn, "SELECT `admin_dtls`.`admin_unique_id`,`admin_dtls`.`admin_status`, `admin_dtls`.`admin_fname`, `admin_dtls`.`admin_lname`, `admin_profile_pic`.`admin_image` FROM `admin_dtls`, `admin_profile_pic` WHERE (`admin_dtls`.`admin_unique_id` = `admin_profile_pic`.`admin_unique_id`) AND (`admin_dtls`.`admin_unique_id` = {$_SESSION['admin_unique_id']}) ");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
              echo"
              <div class='d-flex p-2'>
                <img src=".$row['admin_image']." class='me-2' style='width: 45px; height:50px'> <p><span class='text-white fs-6'>".$row['admin_fname']." ".$row['admin_lname']."</span><br>
                <span class='text-white text-body'>".$row['admin_status']."</span></p></div>
              </div>
              ";
            }
            else
            {
              echo"
              <div class='d-flex p-2'>
                <img src='images/user3.jpg' class='me-2' style='width: 45px; height:50px'> <p><span class='text-white fs-6'>".$row['admin_fname']." ".$row['admin_lname']."</span><br>
                <span class='text-white text-body'>".$row['admin_status']."</span></p></div>
              </div>
              ";
            }
            ?>
            <div class="col-md-1 col-4 p-2 text-center">
              <a href="php/logout.php?logout_id=1192506920" class="btn btn-sm btn-dark"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
          </div>
          <div class="row border-top pt-3 mt-3">
            <div class="col-md-12">
              <div class="input-group mb-3">
              <!--  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i></button>-->
                <div class="search">
                  <span class="text">Select an user to start chat</span>
                  <input type="text" placeholder="Enter name to search...">
                  <button><i class="fas fa-search"></i></button>
                </div>
              </div>
              </div>
              <div class="users-list">
          
              </div>
            </div>
        </div>
        </section>
        </div>
      </div> 
  </section>
    <!--<section class="profile">
        <div class="container">
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM admin_dtls WHERE admin_unique_id = {$_SESSION['admin_unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="images/user3.jpg" alt="">
          <div class="details">
            <span><?php echo $row['admin_fname']." ".$row['admin_lname']; ?></span>
            <p style='color:white;'><?php echo $row['admin_status']; ?></p>
          </div>
        </div>
      </header>
        <a href="php/logout.php?logout_id=<?php echo $row['admin_unique_id']; ?>" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>
        </div>-->

  <script>
      const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

  </script>
  <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>
