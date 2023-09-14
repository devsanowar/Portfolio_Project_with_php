<?php 
session_start();
require_once('../config/db.php');

$testimonial_quote = $_POST['testimonial_quote'];
$client_name = $_POST['client_name'];
$designation = $_POST['designation'];
$testimonial_status = $_POST['testimonial_status'];
$client_photo = $_FILES['client_photo']['name'];
$image_explode = explode('.', $client_photo);
$get_file_name_extension = end($image_explode);
$new_name = uniqid().'.'.$get_file_name_extension;
$old_location = $_FILES['client_photo']['tmp_name'];
$new_location = 'assets/images/testimonial_photo/'.$new_name;

move_uploaded_file($old_location, $new_location);

$testimonial_insert_query = "INSERT INTO pro_testimonials(testimonial_quote,client_name,designation,client_photo,testimonial_status) VALUES('$testimonial_quote','$client_name','$designation','$new_name','$testimonial_status')";
print_r($testimonial_insert_query);
$insert_testimonial_query_run= mysqli_query($db_con, $testimonial_insert_query);
if($insert_testimonial_query_run){
    $_SESSION['success_msg'] = "Testimonial Successfully Inserted.";
    header('Location:add_testimonial.php');
}


?>