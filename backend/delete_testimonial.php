<?php 
require_once('../config/db.php');
$id = $_GET['id'];
// Select image and then image delete/unlink from the folder
$image_delete = "SELECT * FROM pro_testimonials WHERE id=$id";
$image_delete_query_run = mysqli_query($db_con, $image_delete);
$img_after_fetch_assoc = mysqli_fetch_assoc($image_delete_query_run);
if($img_after_fetch_assoc['client_photo'] != 'default.png'){
    unlink('assets/images/testimonial_photo/'.$img_after_fetch_assoc['client_photo']);
}

// Delete All data from database
$delete_testimonial_query = "DELETE FROM pro_testimonials WHERE id=$id";
$delete_testimonials_query_run = mysqli_query($db_con, $delete_testimonial_query);
if($delete_testimonials_query_run){
    header('Location:manage_testimonial.php');
}

