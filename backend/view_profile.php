<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$id = $_SESSION['login_id'];
$select_profile_image = "SELECT profile_photo FROM pro_users WHERE id=$id";
$profile_query_run = mysqli_query($db_con, $select_profile_image);
$profile_fetch_assoc = mysqli_fetch_assoc($profile_query_run);
?>

<div class="row">
    <div class="col-md-5 col-lg-5">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">VIEW PROFILE</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="p-5">
                        <img src="assets/images/profile_photo/<?=$profile_fetch_assoc['profile_photo'];?>" alt="" width="100%">
                        <h3 class="mt-3">Name : <?=$_SESSION['login_name'];?></h3>
                        <h5 class="mt-2">Email : <?=$_SESSION['login_email'];?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>