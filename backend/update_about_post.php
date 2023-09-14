<?php 
session_start();
require_once('../config/db.php');
//SELECT About image from database
$id = $_REQUEST['id'];
$select_about_image = "SELECT about_image FROM pro_abouts WHERE id = $id";
$about_image_query_run = mysqli_query($db_con, $select_about_image);
$final_assoc = mysqli_fetch_assoc($about_image_query_run);

//Update All Data
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

if($about_image){
    if($final_assoc['about_image'] && !empty($final_assoc['about_image'])){
        unlink('assets/images/about_photo/'.$final_assoc['about_image']);
    }
    move_uploaded_file($old_location, $new_location);
    $update_about_info = "UPDATE pro_abouts SET about_description='$about_description',ssc_passing_year='$ssc_passing_year',ssc_certificate_name='$ssc_certificate_name',ssc_grade='$ssc_grade',hsc_passing_year='$hsc_passing_year',hsc_certificate_name='$hsc_certificate_name',hsc_grade='$hsc_grade',honors_passing_year='$honors_passing_year',honors_certificate_name='$honors_certificate_name',honors_grade='$honors_grade',about_image='$file_name',about_status='$about_status' WHERE id='$id'";
}else{
    $update_about_info = "UPDATE pro_abouts SET about_description='$about_description',ssc_passing_year='$ssc_passing_year',ssc_certificate_name='$ssc_certificate_name',ssc_grade='$ssc_grade',hsc_passing_year='$hsc_passing_year',hsc_certificate_name='$hsc_certificate_name',hsc_grade='$hsc_grade',honors_passing_year='$honors_passing_year',honors_certificate_name='$honors_certificate_name',honors_grade='$honors_grade',about_status='$about_status' WHERE id='$id'";
}
$query_run = mysqli_query($db_con, $update_about_info);
if($query_run){
    header('Location:manage_about.php');
}



