<?php 
session_start();
require_once('config/db.php');

$your_name = $_POST['your_name'];
$your_email = $_POST['your_email'];
$message = $_POST['message'];
$flag = false;

if(!$your_name){
    $_SESSION['name_error'] = "Name field is required.";
    $flag = true;
}

if(!$your_email){
    $_SESSION['email_error'] = "Email field is required.";
    $flag = true;
}

if(!$message){
    $_SESSION['message_error'] = "Message field is required.";
    $flag = true;
}

if($flag == true){
    header('Location:index.php');
}else{
    $insert_message = "INSERT INTO pro_messages(your_name,your_email,message) VALUES('$your_name','$your_email','$message')";
    $message_query_run = mysqli_query($db_con, $insert_message);
    if($message_query_run){
        $_SESSION['contact_success_msg'] = "Your message successfully send";
        header('Location:index.php');
    }
}
