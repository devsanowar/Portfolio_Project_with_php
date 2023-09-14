<?php
session_start();
require_once('config/db.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$preg_maa = preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/', $password);
$flag = false;

if($name){
    if(ctype_alpha($name)){
        $_SESSION['old_name'] = $name;
    }else{
        $_SESSION['name_error'] = "Name is invalid.";
        $flag = true;
    }
}else {
    $_SESSION['name_error'] = "Name is Required.";
    $flag = true;
}

if ($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['old_email'] = $email;
    }else{
        $_SESSION['email_error'] = "Email is invalid.";
        $flag = true;

    }
}else{
    $_SESSION['email_error'] = "Email field is required.";
    $flag = true;
}


if ($password) {
    if(strlen($password > 6)){
        $_SESSION['old_password'] = $password;
    }else{
        $_SESSION['password_error'] = "Password Short.";
        $flag = true; 
    }
}else{
    $_SESSION['password_error'] = "Password field is required.";
    $flag = true;
}

if ($confirm_password) {
    $_SESSION['old_confirm_password'] = $confirm_password;
}else{
    $_SESSION['confirm_password_error'] = "Confirm Password field is required.";
    $flag = true;
}

if ($password != $confirm_password) {
    $_SESSION['password_match_error'] = "Password & Confirm Password not match.";
    $flag = true;
}else{
    if($preg_maa != 1){
        $_SESSION['password_error'] = "Password must be Small later, Capital later, special character, Number.";
        $flag = true;
    }elseif($flag == true){
        header('Location:signup.php'); 
    }else{
        $enc_password = md5($password);
        $insert_query = "INSERT INTO pro_users(name,email,password) VALUES('$name','$email','$enc_password')";
        $query_run = mysqli_query($db_con, $insert_query);
        
        if ($query_run) {
            $_SESSION['success_msg'] = "$name Successfully Registered.";
            header('Location:login.php');
        }
    }
}