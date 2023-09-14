<?php 
session_start();
require_once('../config/db.php');
$fact_id = $_REQUEST['id'];
$fact_delete_query = "DELETE FROM pro_facts WHERE id = '$fact_id'";
$fact_delete_query_run = mysqli_query($db_con, $fact_delete_query);
if ($fact_delete_query_run) {
    $_SESSION['fact_delete_success_msg'] = "Fact deleted successfully";
    header('Location:manage_fact.php');
}