<?php
session_start();
require_once('../config/db.php');

$id=$_GET['id'];
$select_image= "SELECT * FROM pro_logos WHERE id = $id";
$select_image_query_run = mysqli_query($db_con, $select_image);
$after_fetch_assoc = mysqli_fetch_assoc($select_image_query_run);

if($after_fetch_assoc['logo_image'] && !empty($after_fetch_assoc['logo_image'])){
    unlink('assets/images/logo/'.$after_fetch_assoc['logo_image']);
}

$delete_logo = "DELETE FROM pro_logos WHERE id=$id";
$delete_logo_query_run = mysqli_query($db_con, $delete_logo);
if($delete_logo_query_run){
    header('Location:manage_logo.php');
}


