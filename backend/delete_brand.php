<?php 
session_start();
require_once('../config/db.php');

$id = $_GET['id'];
// First select image from database and then unlink image
$select_brand_image ="SELECT * FROM pro_brands WHERE id = $id";
$brand_query_run = mysqli_query($db_con, $select_brand_image);
$after_fetch_assoc = mysqli_fetch_assoc($brand_query_run);
if($after_fetch_assoc['brand_image'] != 'default.png'){
    unlink("assets/images/brand_photo/".$after_fetch_assoc['brand_image']);
}
$delete_brand = "DELETE FROM pro_brands WHERE id=$id";
$delete_brand_query_run = mysqli_query($db_con, $delete_brand);
if($delete_brand_query_run){
    header('Location:manage_brand.php');
}

