<?php 
session_start();
require_once('../config/db.php');
$id = $_REQUEST['id'];

// Select Old Image
$select_image = "SELECT * FROM pro_testimonials WHERE id=$id";
$select_image_query = mysqli_query($db_con, $select_image);
$after_final_assoc = mysqli_fetch_assoc($select_image_query);


$testimonial_quote = $_POST['testimonial_quote'];
$client_name = $_POST['client_name'];
$designation = $_POST['designation'];
$testimonial_status = $_POST['testimonial_status'];


$client_photo = $_FILES['client_photo']['name'];
$after_explode = explode('.', $client_photo); //The extension is separated
$get_extension = end($after_explode);  // Get extension
$file_name = uniqid().'.'.$get_extension; // New file name
$old_location = $_FILES['client_photo']['tmp_name']; // Old Location
$new_location = 'assets/images/testimonial_photo/'.$file_name;

if($client_photo){
    if(file_exists('assets/images/testimonial_photo/'.$after_final_assoc['client_photo']) && !empty($after_final_assoc['client_photo'])){
        unlink('assets/images/testimonial_photo/'.$after_final_assoc['client_photo']);
    }
    move_uploaded_file($old_location, $new_location);
    $update_testimonial = "UPDATE pro_testimonials SET testimonial_quote='$testimonial_quote',client_name='$client_name',designation='$designation',client_photo='$file_name',testimonial_status='$testimonial_status' WHERE id=$id";
}else{
    $update_testimonial = "UPDATE pro_testimonials SET testimonial_quote='$testimonial_quote',client_name='$client_name',designation='$designation',testimonial_status='$testimonial_status' WHERE id=$id";
}

$update_query_run = mysqli_query($db_con, $update_testimonial);
if($update_query_run){
    header('Location:manage_testimonial.php');
}












