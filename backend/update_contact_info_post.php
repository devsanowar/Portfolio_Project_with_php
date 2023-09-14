<?php
session_start();
require_once('../config/db.php');

$id = $_REQUEST['id'];
$contact_info = $_POST['contact_info'];
$office_location = $_POST['office_location'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$contact_status = $_POST['contact_status'];

$update_contact_info_query = "UPDATE pro_contact_infos SET contact_info='$contact_info', office_location='$office_location', address='$address', phone='$phone', email='$email', contact_status='$contact_status' WHERE id = '$id'";
$update_query_run = mysqli_query($db_con, $update_contact_info_query);
if($update_query_run){
    $_SESSION['update_contact_info_msg'] = "Contact info successfully updated.";
    header('Location:manage_contact_info.php');
}