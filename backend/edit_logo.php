<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');
$id = $_GET['id'];
$select_logo = "SELECT * FROM pro_logos WHERE id= $id";
$select_query_run = mysqli_query($db_con, $select_logo);
$after_fetch_assoc = mysqli_fetch_assoc($select_query_run);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Edit Logo <span style="float:right"><a href="manage_logo.php" class="btn btn-primary btn btn-sm">Manage Logo</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="update_logo_post.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $after_fetch_assoc['id']?>">
                        <div class="example-content">
                            <label class="form-label">Add Image</label>
                            <input type="file" class="form-control" name="logo_image">
                            <img class="mt-2" src="assets/images/logo/<?= $after_fetch_assoc['logo_image']?>" alt="">
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_logo_btn">Update Logo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>