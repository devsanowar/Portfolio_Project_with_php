<?php 
session_start();
require_once('../config/db.php');

$service_title = $_POST['service_title'];
$service_description = $_POST['service_description'];
$service_icon = $_POST['service_icon'];
$service_status = $_POST['service_status'];

$insert_service_query="INSERT INTO pro_services(service_title,service_description,service_icon,service_status) VALUES('$service_title','$service_description','$service_icon','$service_status')";
$insert_query_run= mysqli_query($db_con, $insert_service_query);
if ($insert_query_run) {
    $_SESSION['service_success_msg'] = "Service Successfully Inserted.";
    header('Location:add_service.php');
}else{
    $_SESSION['service_error_msg'] = "Service Not Inserted.";
    header('Location:add_service.php');
}