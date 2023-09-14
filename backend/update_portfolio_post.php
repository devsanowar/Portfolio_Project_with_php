<?php 
session_start();
require_once('../config/db.php');

$id = $_REQUEST['id'];
$select_portfolio = "SELECT * FROM pro_portfolios WHERE id=$id";
$portfolio_query_run = mysqli_query($db_con, $select_portfolio);
$after_fetch_assoc = mysqli_fetch_assoc($portfolio_query_run);

function Slug($string){
    return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}


$category_id = $_POST['category_id'];
$portfolio_title = $_POST['portfolio_title'];
$portfolio_slug = Slug($portfolio_title);
$portfolio_description = $_POST['portfolio_description'];
$portfolio_status = $_POST['portfolio_status'];

$portfolio_image = $_FILES['portfolio_image']['name'];
$image_explode = explode('.', $portfolio_image);
$get_file_extension = end($image_explode);
$file_name = uniqid().'.'.$get_file_extension;
$old_location = $_FILES['portfolio_image']['tmp_name'];
$new_location = "assets/images/portfolio_photo/".$file_name;

if($portfolio_image){
    if(file_exists('assets/images/portfolio_photo/'.$after_fetch_assoc['portfolio_image']) && !empty($after_fetch_assoc['portfolio_image'])){
        unlink('assets/images/portfolio_photo/'.$after_fetch_assoc['portfolio_image']);
    }

    move_uploaded_file($old_location, $new_location);
    $update_portfolio = "UPDATE pro_portfolios SET category_id='$category_id',portfolio_title='$portfolio_title',portfolio_slug='$portfolio_slug',portfolio_description='$portfolio_description',portfolio_image='$file_name',portfolio_status='$portfolio_status' WHERE id=$id";
}else{
    $update_portfolio = "UPDATE pro_portfolios SET category_id='$category_id',portfolio_title='$portfolio_title',portfolio_slug='$portfolio_slug',portfolio_description='$portfolio_description',portfolio_status='$portfolio_status' WHERE id=$id";
}
$update_query_run = mysqli_query($db_con, $update_portfolio);
if($update_query_run){
    $_SESSION['update_success_msg'] = "Portfolio Successfully Updated.";
    header('Location:manage_portfolio.php');
}