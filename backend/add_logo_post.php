<?php 
session_start();
require_once('../config/db.php');

$logo = $_FILES['logo_image']['name'];
$after_explode = explode('.', $logo);
$get_file_extension = end($after_explode);
$file_name = uniqid().'.'.$get_file_extension;
$old_location = $_FILES['logo_image']['tmp_name'];
$new_location = 'assets/images/logo/'.$file_name;

move_uploaded_file($old_location, $new_location);

$logo_insert = "INSERT INTO pro_logos(logo_image) VALUES('$file_name')";
$logo_query_run = mysqli_query($db_con, $logo_insert);
if($logo_query_run){
$_SESSION['success_msg'] = "Logo Successfully Inserted";
header('Location:add_logo.php');
}

