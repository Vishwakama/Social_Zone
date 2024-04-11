<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['admin_unique_id'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <link rel="stylesheet" href="css/all.css" type="text/css">
    <title>Social Zone</title>
    <style>
    .profile{
        margin-top: 10px;
    }
    .chat-area header{
        display: flex;
        align-items: center;
        padding: 18px 30px;
        }
        .chat-area header img{
        height: 45px;
        width: 45px;
        margin: 0 15px;
        }
        .chat-area header .details span{
        font-size: 17px;
        font-weight: 500;
        }
        .chat-box{
        position: relative;
        min-height: 450px;
        max-height: 450px;
        overflow-y: auto;
        padding: 10px 30px 20px 30px;
        background: white;
        box-shadow: inset 0 32px 32px -32px rgb(0 0 0 / 5%),
                    inset 0 -32px 32px -32px rgb(0 0 0 / 5%);
        }
        .chat-box .text{
        position: absolute;
        top: 45%;
        left: 50%;
        width: calc(100% - 50px);
        text-align: center;
        transform: translate(-50%, -50%);
        }
        .chat-box .chat{
        margin: 15px 0;
        }
        .chat-box .chat p{
        word-wrap: break-word;
        padding: 8px 16px;
        box-shadow: 0 0 32px rgb(0 0 0 / 8%),
                    0rem 16px 16px -16px rgb(0 0 0 / 10%);
        }
        .chat-box .outgoing{
        display: flex;
        }
        .chat-box .outgoing .details{
        margin-left: auto;
        max-width: calc(100% - 130px);
        }
        .outgoing .details p{
        background: #333;
        color: #fff;
        border-radius: 18px 18px 0 18px;
        }
        .chat-box .incoming{
        display: flex;
        align-items: flex-end;
        }
        .chat-box .incoming img{
        height: 35px;
        width: 35px;
        }
        .chat-box .incoming .details{
        margin-right: auto;
        margin-left: 10px;
        max-width: calc(100% - 130px);
        }
        .incoming .details p{
        background: #fff;
        color: #333;
        border-radius: 18px 18px 18px 0;
        }
        .typing-area{
        padding: 18px 30px;
        display: flex;
        justify-content: space-between;
        }
        .typing-area input{
        height: 45px;
        width: calc(100% - 58px);
        font-size: 16px;
        padding: 0 13px;
        border: 1px solid #e6e6e6;
        outline: none;
        border-radius: 5px 0 0 5px;
        }
        .typing-area button{
        color: #fff;
        width: 55px;
        border: none;
        outline: none;
        background: #333;
        font-size: 19px;
        cursor: pointer;
        opacity: 0.7;
        pointer-events: none;
        border-radius: 0 5px 5px 0;
        transition: all 0.3s ease;
        }
        .typing-area button.active{
        opacity: 1;
        pointer-events: auto;
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
                    <li><a href='private_account.php?accnt_id=".$row['admin_unique_id']."' title=''><font color='green'>Regular Account</font></a></li>
                    <li><a href='' title=''><font color='red'>Delete Account</font></a></li>";
                }
                else{
                    echo"<li><a href='private_account.php?accnt_id=".$row['admin_unique_id']."' title=''><font color='red'>Private Account</font></a></li>
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
</header>

    <section class="profile">
        <div class="container bg-light">
			<div class="wrapper">
            <section class="chat-area">
            <header>
                <?php 
                $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                $sql = mysqli_query($conn, "SELECT `admin_dtls`.`admin_unique_id`, `admin_dtls`.`admin_fname`, `admin_dtls`.`admin_lname`, `admin_dtls`.`admin_status`, `admin_profile_pic`.`admin_image`
                FROM `admin_dtls`, `admin_profile_pic` WHERE `admin_dtls`.`admin_unique_id`=`admin_profile_pic`.`admin_unique_id` AND `admin_dtls`.`admin_unique_id` = '$user_id' ");
                if(mysqli_num_rows($sql) > 0){
                    $row = mysqli_fetch_assoc($sql);
                    $admin_pic = $row['admin_image'];
                    echo"<img src='".$row['admin_image']."' alt=''>
                        <div class='details'>
                        <span>".$row['admin_fname']." ".$row['admin_lname']."</span>
                        <p style='color:white;'>".$row['admin_status']."</p>
                        </div>";
                }else{
                    $sql = mysqli_query($conn,"SELECT * FROM admin_dtls WHERE admin_unique_id = '$user_id'");
                    mysqli_num_rows($sql);
                    $row = mysqli_fetch_assoc($sql);
                    echo"<img src='images/user3.jpg' alt=''>
                        <div class='details'>
                        <span>".$row['admin_fname']." ".$row['admin_lname']."</span>
                        <p style='color:white;'>".$row['admin_status']."</p>
                        </div>";
                }
                ?>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
            </section>
        </div>
	</div>
    </section>
  <script>
      const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }
  
  </script>
<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>
