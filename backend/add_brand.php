<?php 
session_start();
require_once('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Add Brand <span style="float:right"><a href="manage_brand.php" class="btn btn-primary btn btn-sm">Manage Brand</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_brand_post.php" method="POST" enctype="multipart/form-data">
                        <div class="example-content">
                            <label class="form-label">Add Image</label>
                            <input type="file" class="form-control" name="brand_image">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Brand Status</label>
                            <select class="form-control" name="brand_status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_brand_btn">Add Brand</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>