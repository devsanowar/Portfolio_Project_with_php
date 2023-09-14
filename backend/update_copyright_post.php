<?php 
session_start();
require_once('../config/db.php');

$id = $_REQUEST['id'];
$copyright_text = $_POST['copyright_text'];

$update_copyright = "UPDATE pro_copyright SET copyright_text='$copyright_text' WHERE id=$id";
$copyright_query_run = mysqli_query($db_con, $update_copyright);
if($copyright_query_run){
    header('Location:copyright_text.php');
}