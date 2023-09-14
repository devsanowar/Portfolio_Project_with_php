<?php 
session_start();
require_once('../config/db.php');

$id = $_GET['id'];
$delete_category = "DELETE FROM pro_portfolio_categories WHERE id=$id";
$delete_query_run = mysqli_query($db_con, $delete_category);
if($delete_query_run){
    $_SESSION['success_msg']="Category Successfully deleted.";
    header('Location:manage_portfolio_category.php');
}