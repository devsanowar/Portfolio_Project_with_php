<?php 
session_start();
require_once('../config/db.php');

function Slug($string){
    return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}

$id = $_REQUEST['id'];
$category_name = $_POST['category_name'];
$category_slug = Slug($category_name);
$category_status = $_POST['category_status'];
$update_category = "UPDATE pro_portfolio_categories SET category_name='$category_name',category_slug='$category_slug', category_status='$category_status' WHERE id=$id";
$update_query_run = mysqli_query($db_con, $update_category);
if($update_query_run){
    header('Location:manage_portfolio_category.php');
}

