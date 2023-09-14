<?php 
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'project';

$db_con = mysqli_connect($db_host, $db_username, $db_password, $db_name );

if (!$db_con) {
    echo "Database not connected";
}