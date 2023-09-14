<?php
session_start();
require_once('../config/db.php');

function Slug($string){
    return strtolower(trim(preg_replace('~[^0-9a-z]+~i', '-', html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($string, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), '-'));
}

$category_name = $_POST['category_name'];
$category_slug = Slug($category_name);
$category_status = $_POST['category_status'];

$insert_category = "INSERT INTO pro_portfolio_categories(category_name,category_slug,category_status) VALUES('$category_name','$category_slug','$category_status')";
$category_query_run = mysqli_query($db_con, $insert_category);
if($category_query_run){
    $_SESSION['success_msg'] = "Category Successfully Inserted.";
    header('Location:add_portfolio_category.php');
}

