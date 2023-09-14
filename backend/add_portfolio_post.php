<?php 
session_start();
require_once('../config/db.php');

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
move_uploaded_file($old_location, $new_location);

$insert_portfolio = "INSERT INTO pro_portfolios(category_id,portfolio_title,portfolio_slug,portfolio_description,portfolio_image,portfolio_status) VALUES('$category_id','$portfolio_title','$portfolio_slug','$portfolio_description','$file_name','$portfolio_status')";
$insert_query_run = mysqli_query($db_con, $insert_portfolio);
if($insert_query_run){
    $_SESSION['success_msg'] = "Portfolio Successfully Inserted.";
    header('Location:add_portfolio.php');
}
