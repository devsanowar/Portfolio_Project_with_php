<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$id = $_GET['id'];
$edit_category="SELECT * FROM pro_portfolio_categories WHERE id=$id";
$edit_query_run = mysqli_query($db_con, $edit_category);
$after_fetch_assoc = mysqli_fetch_assoc($edit_query_run);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Edit Portfolio Category <span style="float:right"><a href="manage_portfolio_category.php" class="btn btn-primary btn btn-sm">Manage Portfolio Category</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="update_portfolio_category_post.php" method="POST">
                        <input type="hidden" name="id" value="<?=$after_fetch_assoc['id']?>">
                        <div class="example-content">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name" value="<?=$after_fetch_assoc['category_name']?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Category Slug</label>
                            <input type="text" class="form-control" name="category_slug" value="<?=$after_fetch_assoc['category_slug']?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Category Status</label>
                            <select class="form-control" name="category_status">
                                <option value="active" <?php if($after_fetch_assoc['category_status'] == 'active') : echo 'selected'; endif;?>>Active</option>
                                <option value="deactive" <?php if($after_fetch_assoc['category_status'] != 'active') : echo 'selected'; endif;?>>Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_category_btn">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>