<?php
session_start();
require_once('config/db.php');

$email = $_POST['email'];
$password = md5($_POST['password']);

$select_with_match_query = "SELECT COUNT(*) AS 'result' FROM pro_users WHERE email = '$email' AND password = '$password'";
$query_run = mysqli_query($db_con, $select_with_match_query);
$data_assoc = mysqli_fetch_assoc($query_run)['result'];

$_SESSION['login_name'] = $name;
$_SESSION['login_email'] = $email;
$_SESSION['login_id'] = $id;

if($data_assoc == 1){
    // Select name and id field for displaying in the dashboard
    $select_user_info = "SELECT id,name FROM pro_users WHERE email='$email'";
    $final_query_run = mysqli_query($db_con, $select_user_info);
    $after_assoc = mysqli_fetch_assoc($final_query_run);

    $_SESSION['login_name'] = $after_assoc['name'];
    $_SESSION['login_id'] = $after_assoc['id'];
    $_SESSION['login_email'] = $email;

    header('Location:backend/dashboard.php');
}else{
    $_SESSION['login_error'] = "Email & Password invalid.";
    header('Location:login.php');
}
