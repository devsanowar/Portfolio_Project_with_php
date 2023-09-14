<?php
session_start();
require_once('header.php');
require_once('../config/db.php');
?>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <?php if (isset($_SESSION['updated_msg'])) : ?>
                <h5 class="text-success"><?=$_SESSION['updated_msg'];?></h5>
            <?php endif; unset($_SESSION['updated_msg']);?>

            <?php if (isset($_SESSION['updated_error_msg'])) : ?>
                <h5 class="text-danger"><?=$_SESSION['updated_error_msg'];?></h5>
            <?php endif; unset($_SESSION['updated_error_msg']);?>

            <h5 class="card-title">Change Name & Email</h5>
        </div>
        <div class="card-body">
            <div class="example-container">
                <div class="example-content">
                    <form action="profile_setting_post.php" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" value="<?php if(isset($_SESSION['login_name'])) : echo $_SESSION['login_name']; endif?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="<?php if(isset($_SESSION['login_email'])) : echo $_SESSION['login_email']; endif?>">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="update_name_email">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
        <?php if (isset($_SESSION['success_msg'])) : ?>
                <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
            <?php endif; unset($_SESSION['success_msg']);?>

            <?php if (isset($_SESSION['error_msg'])) : ?>
                <h5 class="text-danger"><?=$_SESSION['error_msg'];?></h5>
            <?php endif; unset($_SESSION['error_msg']);?>
            <h5 class="card-title">Profile Photo Upload</h5>
        </div>

        <div class="card-body">
            <div class="example-container">
                <div class="example-content">
                    <?php 
                        $id = $_SESSION['login_id'];
                        $select_data_query = "SELECT * FROM pro_users WHERE id=$id";
                        $query_run = mysqli_query($db_con, $select_data_query);
                        $row = mysqli_fetch_array($query_run);
                        
                    
                    ?>
                    <form action="profile_setting_post.php" method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="profile_photo" value="assets/images/profile_photo/<?= $row['profile_photo'];?>">
                                <img class="mt-3" src="assets/images/profile_photo/<?= $row['profile_photo']?>" alt="" width="80" height="80">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="upload_photo_btn">Update Profile Photo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Password Update</h5>
        </div>
        <div class="card-body">
            <div class="example-container">
                <div class="example-content">
                    <form action="profile_setting_post.php" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="password">
                                <?php if (isset($_SESSION['pass_error'])) : ?>
                                    <h5 class="text-danger"><?=$_SESSION['pass_error'];?></h5>
                                <?php endif; unset($_SESSION['pass_error']);?>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" name="confirm_password">
                                <?php if (isset($_SESSION['confirm_pass_error'])) : ?>
                                    <h5 class="text-danger"><?=$_SESSION['confirm_pass_error'];?></h5>
                                <?php endif; unset($_SESSION['confirm_pass_error']);?>
                                <?php if (isset($_SESSION['match_pass_error'])) : ?>
                                    <h5 class="text-danger"><?=$_SESSION['match_pass_error'];?></h5>
                                <?php endif; unset($_SESSION['match_pass_error']);?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="password_update">Password Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
require_once('footer.php');
?>