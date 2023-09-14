<?php 
session_start();
require_once('../config/db.php');
$id = $_GET['id'];
$delete_message = "DELETE FROM pro_messages WHERE id = $id";
$delete_query_run = mysqli_query($db_con, $delete_message);
if($delete_query_run){
    header('Location:all_message.php');
}