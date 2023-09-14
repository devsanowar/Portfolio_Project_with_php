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
                <h5 class="card-title">Add Logo <span style="float:right"><a href="manage_logo.php" class="btn btn-primary btn btn-sm">Manage Logo</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_logo_post.php" method="POST" enctype="multipart/form-data">
                        <div class="example-content">
                            <label class="form-label">Add Logo</label>
                            <input type="file" class="form-control" name="logo_image">
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_logo_btn">Add Logo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>