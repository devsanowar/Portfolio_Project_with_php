<?php 
session_start();
require_once('../config/db.php');

//SELECT Image 
$id = $_REQUEST['id'];
$select_image= "SELECT * FROM pro_logos WHERE id = $id";
$select_image_query_run = mysqli_query($db_con, $select_image);
$after_fetch_assoc = mysqli_fetch_assoc($select_image_query_run);


$logo = $_FILES['logo_image']['name'];
$after_explode = explode('.', $logo);
$get_file_extension = end($after_explode);
$file_name = uniqid().'.'.$get_file_extension;
$old_location = $_FILES['logo_image']['tmp_name'];
$new_location = 'assets/images/logo/'.$file_name;

if($logo){
    if($after_fetch_assoc['logo_image'] && !empty($after_fetch_assoc['logo_image'])){
        unlink('assets/images/logo/'.$after_fetch_assoc['logo_image']);
    }
   move_uploaded_file($old_location, $new_location);
   $update_logo = "UPDATE pro_logos SET logo_image='$file_name' WHERE id=$id";
}else{
    header('Location:manage_logo.php');
}

$update_logo_query_run = mysqli_query($db_con, $update_logo);
if($update_logo_query_run){
    $_SESSION['success_msg'] = "Logo successfully updated";
    header('Location:manage_logo.php');
}