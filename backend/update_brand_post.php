<?php
session_start();
require_once('../config/db.php');

$id = $_REQUEST['id'];
$select_old_brand_image = "SELECT * FROM pro_brands WHERE id=$id";
$old_brand_query_run = mysqli_query($db_con, $select_old_brand_image);
$old_brand_fetch_assoc = mysqli_fetch_assoc($old_brand_query_run);

$brand_status =$_POST['brand_status'];
$brand_image = $_FILES['brand_image']['name'];
$after_explode = explode('.', $brand_image);
$get_file_extension = end($after_explode);
$file_name = uniqid().'.'.$get_file_extension;
$old_location = $_FILES['brand_image']['tmp_name'];
$new_location = 'assets/images/brand_photo/'.$file_name;

if($brand_image){
    if($old_brand_fetch_assoc['brand_image'] && !empty($old_brand_fetch_assoc['brand_image'])){
        unlink('assets/images/brand_photo/'.$old_brand_fetch_assoc['brand_image']);
    }
    move_uploaded_file($old_location, $new_location);
    $update_brand = "UPDATE pro_brands SET brand_image='$file_name',brand_status='$brand_status' WHERE id=$id";
}else{
    $update_brand = "UPDATE pro_brands SET brand_status='$brand_status' WHERE id=$id";
}
$brand_query_run = mysqli_query($db_con, $update_brand);
if($brand_query_run){
    $_SESSION['success_msg'] = "Brand successfully updated";
    header('Location:manage_brand.php');
}

