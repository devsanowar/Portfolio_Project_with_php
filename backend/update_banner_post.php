<?php 
session_start();
require_once('../config/db.php');

$id = $_REQUEST['id'];

$select_banner_image = "SELECT * FROM pro_banners WHERE id=$id";
$select_banner_run_query = mysqli_query($db_con, $select_banner_image);
$after_fetch_assoc = mysqli_fetch_assoc($select_banner_run_query);

$banner_title = $_POST['banner_title'];
$banner_description= $_POST['banner_description'];
$facebook_url = $_POST['facebook_url'];
$instagram_url = $_POST['instagram_url'];
$linkedin_url = $_POST['linkedin_url'];
$twitter_url = $_POST['twitter_url'];
$portfolio_url = $_POST['portfolio_url'];

$banner_image = $_FILES['banner_image']['name'];
$after_explode = explode('.', $banner_image);
$get_file_name_extension = end($after_explode);
$file_name = uniqid().'.'.$get_file_name_extension;
$old_location = $_FILES['banner_image']['tmp_name'];
$new_location = "assets/images/banner_photo/".$file_name;

if($banner_image){
    if($after_fetch_assoc['banner_image'] && !empty($after_fetch_assoc['banner_image'])){
        unlink('assets/images/banner_photo/'.$after_fetch_assoc['banner_image']);
    }
    move_uploaded_file($old_location, $new_location);
    $update_banners_query = "UPDATE pro_banners SET banner_title='$banner_title', banner_description='$banner_description', facebook_url='$facebook_url', instagram_url='$instagram_url', linkedin_url='$linkedin_url', twitter_url='$twitter_url', portfolio_url='$portfolio_url', banner_image='$file_name' WHERE id='$id'";
}else{
    $update_banners_query = "UPDATE pro_banners SET banner_title='$banner_title', banner_description='$banner_description', facebook_url='$facebook_url', instagram_url='$instagram_url', linkedin_url='$linkedin_url', twitter_url='$twitter_url', portfolio_url='$portfolio_url' WHERE id='$id'";
}

$update_query_run = mysqli_query($db_con, $update_banners_query);
if($update_query_run){
    $_SESSION['success_msg'] = "Banner information successfully updated";
    header('Location:manage_banner.php');
}

