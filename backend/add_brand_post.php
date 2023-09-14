<?php 
session_start();
require_once('../config/db.php');

$brand_status = $_POST['brand_status'];
$brand_image = $_FILES['brand_image']['name'];
$after_explode = explode('.', $brand_image);
$get_file_extension = end($after_explode);
$file_name = uniqid().'.'.$get_file_extension;
$old_location = $_FILES['brand_image']['tmp_name'];
$new_location = "assets/images/brand_photo/".$file_name;
move_uploaded_file($old_location, $new_location);

$insert_brand_query = "INSERT INTO pro_brands(brand_image,brand_status) VALUES('$file_name','$brand_status')";
$brand_query_run = mysqli_query($db_con, $insert_brand_query);
if($brand_query_run){
    $_SESSION['success_msg'] = "Brand image successfully inserted.";
    header('Location:add_brand.php');
}

