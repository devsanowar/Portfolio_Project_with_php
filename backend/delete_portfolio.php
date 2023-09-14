<?php
session_start();
require_once('../config/db.php');

$id = $_GET['id'];
// Select image and then image delete/unlink from the folder
$image_delete = "SELECT * FROM pro_portfolios WHERE id=$id";
$image_delete_query_run = mysqli_query($db_con, $image_delete);
$img_after_fetch_assoc = mysqli_fetch_assoc($image_delete_query_run);
if($img_after_fetch_assoc['portfolio_image'] != 'default.png'){
    unlink('assets/images/portfolio_photo/'.$img_after_fetch_assoc['portfolio_image']);
}

// Delete All data from database
$delete_portfolio_query = "DELETE FROM pro_portfolios WHERE id=$id";
$delete_portfolio_query_run = mysqli_query($db_con, $delete_portfolio_query);
if($delete_portfolio_query_run){
    header('Location:manage_portfolio.php');
}
