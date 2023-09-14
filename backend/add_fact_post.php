<?php
session_start();
require_once('../config/db.php');

$fact_title = $_POST['fact_title'];
$fact_value = $_POST['fact_value'];
$fact_icon = $_POST['fact_icon'];
$fact_status = $_POST['fact_status'];

$fact_insert_query = "INSERT INTO pro_facts(fact_title,fact_value,fact_icon,fact_status) VALUES('$fact_title','$fact_value','$fact_icon','$fact_status')";
$insert_query_run = mysqli_query($db_con, $fact_insert_query);

if($insert_query_run){
    $_SESSION['fact_insert_success_msg'] = "Fact Successfully inserted";
    header('Location:add_fact.php');
}

