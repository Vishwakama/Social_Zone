<?php 
  session_start();
  if(isset($_SESSION['admin_unique_id'])){
    //header("location:profile.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title>Social Zone</title>
    <style>
         body{
            /*background-color:#f6f6fb;
            /*Button Color: 5108f6*/
            background-image: url('images/1988484746.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            font-family: Century Gothic;
        }
        .container{
            width: 320px;
            height: 300px;
            background-color: white;
            border-radius: 15px;
            /*opacity:0.6;*/
        }
        input[type=email]{
            border-color: #cbb5fd;
            width: 290px;
            border-width: 2px;
            margin-top: 10px;
        }
        input[type=password]{
            border-color: #cbb5fd;
            width: 290px;
            border-width: 2px;
            margin-top: 10px;
        }
        input[type=text]{
            border-color: #cbb5fd;
            width: 290px;
            border-width: 2px;
            margin-top: 10px;
        }
        .btn{
            background-color: #7640f8;
            width: 150px;
        }
        .form-submit{
            background-color: #7640f8;
            width: 150px;
            height: 38px;
            margin-top: 10px;
            border-radius: 5px;
            color: white;
        }
        .sign-up{
            margin-top: 0px;
        }

    </style>
</head>
<body>
<section class="login">
    <div class="login-form">
        <div class="container" align="center">
            <form align="center" class="mt-5" method="POST">
            <div class="error-text"></div>
                <h3><font color="#7640f8">S</font>ocial <font color="#7640f8">Z</font>one</h3>
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email" required="" aria-describedby="emailHelp" placeholder="email">
                </div>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" autocomplete="current-password" required="" id="password" placeholder="password">
                </div>
                <div class="field button mb-3 mt-3">
                <input type="submit" name="submit" value="login" class="form-submit">
                </div>
            </form>
            <div class="mt-3">
                <p>Don't have account???</br>
                <a href="signup.php">Sign Up</a></p>
            </div>
    </div>
    </div>
</section>
    <script>
	    const form = document.querySelector(".login form"),
        continueBtn = form.querySelector(".button input"),
        errorText = form.querySelector(".error-text");

        form.onsubmit = (e)=>{
            e.preventDefault();
        }

        continueBtn.onclick = ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/login.php", true);
            xhr.onload = ()=>{
            if(xhr.readyState === XMLHttpRequest.DONE){
                if(xhr.status === 200){
                    let data = xhr.response;
                    if(data === "success"){
                        location.href = "home.php";
                    }else{
                        errorText.style.display = "block";
                        errorText.textContent = data;
                    }
                }
            }
            }
            let formData = new FormData(form);
            xhr.send(formData);
        }
	</script>
    <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="javascript/script.js"></script>
</body>
</html>