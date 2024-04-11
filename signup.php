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
            background-image: url('images/1988484746.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            font-family: Century Gothic;
        }
        .container{
            width: 320px;
            height: 530px;
            /*background-color: White;*/
            border-radius: 15px;
        }
        input[type=email]{
            border-color: #cbb5fd;
            width: 290px;
            margin-top: 10px;
            border-width: 2px;
        }
        input[type=tel]{
            border-color: #cbb5fd;
            width: 290px;
            margin-top: 10px;
            border-width: 2px;
        }
        input[type=text]{
            border-color: #cbb5fd;
            width: 290px;
            margin-top: 10px;
            border-width: 2px;
        }
        input[type=password]{
            border-color: #cbb5fd;
            width: 290px;
            border-width: 2px;
            margin-top:10px;
        }
        .form-submit{
            background-color: #7640f8;
            width: 150px;
            height: 35px;
            margin-top: 10px;
            border-radius: 5px;
            color: white;
        }
        #message {
            display:none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }

        #message p {
            padding: 5px 15px;
            font-size: 13px;
        }

        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }
    </style>
</head>
<body>
    <section class="signup form">
        <form align="center" class="mt-5" action="" method="POST" id="signup-form">
        <div class="error-text"></div>
        <div class="container" align="center">
            <h3 class="mt-3" style="margin-top: 25px"><font color="#7640f8">S</font>ocial <font color="#7640f8">Z</font>one</h3>
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" name="firstname" id="firstname" required="" placeholder="first name">
            </div>
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" name="lastname" id="lastname" required="" placeholder="last name">
            </div>
            <div class="mb-3 mt-3">
                <input type="text" class="form-control" placeholder="date of birth" onfocus="(this.type='date')" name="dob"  required="" id="dob">
            </div>
            <div class="mb-3 mt-3">
                <input type="tel" class="form-control" id="phone" name="phone" required="" placeholder="phone">
            </div>
            <div class="mb-3 mt-3">
                <input type="email" class="form-control" id="email" name="email" required="" placeholder="email">
            </div>
            <div class="mb-3 mt-3">
                <input type="password" class="form-control" id="password" name="password" required="" placeholder="password">
                <div class="invalid-feedback">
                    Please write Password
                </div>
            </div>
            <div id="message">
                <h4>Password must contain the following:</h4>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
            </div>
            <div class="mb-3 mt-3">
                <input type="radio" name="gender" id="gender" value="male" required />
                <label for="male">Male</label>
                <input type="radio" name="gender" id="gender" value="female" required />
                <label for="female">Female</label>
            </div>
            <div class="field button mb-3 mt-3">
                <input type="submit" name="submit" id="signup" class="form-submit" value="Signup" />
            </div>
            <div class="mt-3">
                <p><a href="login.php">Already have an account???</a></p>
            </div>
        </div>
    </form>
    </section>
<script>
    var myInput = document.getElementById("password");
	var letter = document.getElementById("letter");
	var capital = document.getElementById("capital");
	var number = document.getElementById("number");
	var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
	myInput.onfocus = function() {
		document.getElementById("message").style.display = "block";
	}

// When the user clicks outside of the password field, hide the message box
	myInput.onblur = function() {
		document.getElementById("message").style.display = "none";
	}

// When the user starts to type something inside the password field
	myInput.onkeyup = function() {
// Validate lowercase letters
	var lowerCaseLetters = /[a-z]/g;
	if(myInput.value.match(lowerCaseLetters)) {  
		letter.classList.remove("invalid");
		letter.classList.add("valid");
	} else {
		letter.classList.remove("valid");
		letter.classList.add("invalid");
	}
  
 // Validate capital letters
	var upperCaseLetters = /[A-Z]/g;
	if(myInput.value.match(upperCaseLetters)) {  
		capital.classList.remove("invalid");
		capital.classList.add("valid");
	} else {
		capital.classList.remove("valid");
		capital.classList.add("invalid");
	}

  // Validate numbers
	var numbers = /[0-9]/g;
	if(myInput.value.match(numbers)) {  
		number.classList.remove("invalid");
		number.classList.add("valid");
	} else {
		number.classList.remove("valid");
		number.classList.add("invalid");
	}
  
 // Validate length
	if(myInput.value.length >= 8) {
		length.classList.remove("invalid");
		length.classList.add("valid");
	} else {
		length.classList.remove("valid");
		length.classList.add("invalid");
	}
	}

    const form = document.querySelector(".signup form"),
    continueBtn = form.querySelector(".button input"),
    errorText = form.querySelector(".error-text");

    form.onsubmit = (e)=>{
        e.preventDefault();
    }

    continueBtn.onclick = ()=>{
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/signup.php", true);
        xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                if(data === "success"){
                    location.href="profile.php";
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
</body>
</html>