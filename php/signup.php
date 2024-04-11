<?php
    session_start();
    include_once "config.php";
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $tel = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    
    if(!empty($firstname) && !empty($lastname) && !empty($dob) && !empty($email) && !empty($tel) && !empty($password) && !empty($gender)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn, "SELECT * FROM admin_dtls WHERE admin_email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$email - This email already exist!";
                }else{
                    $ran_id = rand(time(), 100000000);
                    $status = "Active now";
                    $encrypt_pass = md5($password);
                    $insert_query = mysqli_query($conn, "INSERT INTO admin_dtls (admin_unique_id, admin_fname, admin_lname, admin_dob, admin_phone, admin_email, admin_password, admin_gender, admin_status)
                    VALUES ({$ran_id}, '{$firstname}','{$lastname}','{$dob}','{$tel}','{$email}','{$encrypt_pass}', '{$gender}', '{$status}')");
                    if($insert_query){
                        $select_sql2 = mysqli_query($conn, "SELECT * FROM admin_dtls WHERE admin_email = '{$email}'");
                        if(mysqli_num_rows($select_sql2) > 0){
                            $result = mysqli_fetch_assoc($select_sql2);
                            $_SESSION['admin_unique_id'] = $result['admin_unique_id'];
                            echo "success";
                        }else{
                            echo "This email address not Exist!";
                        }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>