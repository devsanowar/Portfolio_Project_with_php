<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$id = $_GET['id'];
$edit_brand = "SELECT * FROM pro_brands WHERE id = $id";
$brand_run_query = mysqli_query($db_con, $edit_brand);
$brand_fetch_assoc = mysqli_fetch_assoc($brand_run_query);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Edit Brand <span style="float:right"><a href="manage_brand.php" class="btn btn-primary btn btn-sm">Manage Brand</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="update_brand_post.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $brand_fetch_assoc['id'];?>">
                        <div class="example-content">
                            <label class="form-label">Add Image</label>
                            <input type="file" class="form-control" name="brand_image">
                            <img src="assets/images/brand_photo/<?= $brand_fetch_assoc['brand_image'];?>" class="mt-2" alt="">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Brand Status</label>
                            <select class="form-control" name="brand_status">
                                <option value="active" <?php if($brand_fetch_assoc['brand_status'] == 'active') : echo 'selected'; endif;?>>Active</option>
                                <option value="deactive" <?php if($brand_fetch_assoc['brand_status'] != 'active') : echo 'selected'; endif;?>>Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_brand_btn">Update Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>