<?php
session_start();
require_once('../config/db.php');

$contact_info = $_POST['contact_info'];
$office_location = $_POST['office_location'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$contact_status = $_POST['contact_status'];

$contact_info_insert_query = "INSERT INTO pro_contact_infos(contact_info,office_location,address,phone,email,contact_status) VALUES('$contact_info','$office_location','$address','$phone','$email','$contact_status')";
$insert_query_run = mysqli_query($db_con, $contact_info_insert_query);

if($insert_query_run){
    $_SESSION['contact_info_success_msg'] = "Contact Info Successfully inserted";
    header('Location:add_contact_info.php');
}