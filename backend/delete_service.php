<?php 
session_start();
require_once('../config/db.php');

$id = $_REQUEST['id'];
$service_delete_query = "DELETE FROM pro_services WHERE id='$id'";
$delete_query_run = mysqli_query($db_con, $service_delete_query);
$_SESSION['delete_success_message'] = "Services Data Successfully Deleted.";
header('location:manage_service.php');