<?php
session_start();
require_once('../config/db.php');

$about_description = $_POST['about_description'];
$ssc_passing_year = $_POST['ssc_passing_year'];
$ssc_certificate_name = $_POST['ssc_certificate_name'];
$ssc_grade = $_POST['ssc_grade'];
$hsc_passing_year = $_POST['hsc_passing_year'];
$hsc_certificate_name = $_POST['hsc_certificate_name'];
$hsc_grade = $_POST['hsc_grade'];
$honors_passing_year = $_POST['honors_passing_year'];
$honors_certificate_name = $_POST['honors_certificate_name'];
$honors_grade = $_POST['honors_grade'];
$about_status = $_POST['about_status'];

$about_image = $_FILES['about_image']['name'];
$after_explode = explode('.',$about_image);
$get_file_extension = end($after_explode);
$file_name = uniqid().'.'.$get_file_extension;
$old_location = $_FILES['about_image']['tmp_name'];
$new_location = 'assets/images/about_photo/'.$file_name;
move_uploaded_file($old_location, $new_location);

$insert_about = "INSERT INTO pro_abouts(about_description,ssc_passing_year,ssc_certificate_name,ssc_grade,hsc_passing_year,hsc_certificate_name,hsc_grade,honors_passing_year,honors_certificate_name,honors_grade,about_image,about_status) VALUES('$about_description','$ssc_passing_year','$ssc_certificate_name','$ssc_grade','$hsc_passing_year','$hsc_certificate_name','$hsc_grade','$honors_passing_year','$honors_certificate_name','$honors_grade','$file_name','$about_status')";
$insert_query_run = mysqli_query($db_con, $insert_about);

if($insert_query_run){
    $_SESSION['about_success_msg'] = "About Information Successfully Inserted.";
    header('Location:add_about.php');
}
