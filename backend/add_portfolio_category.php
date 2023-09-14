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
                <h5 class="card-title">Add Portfolio Category <span style="float:right"><a href="manage_portfolio_category.php" class="btn btn-primary btn btn-sm">Manage Portfolio Category</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_portfolio_category_post.php" method="POST">
                        <div class="example-content">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="category_name">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Category Slug</label>
                            <input type="text" class="form-control" name="category_slug">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Category Status</label>
                            <select class="form-control" name="category_status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_fact_btn">Add Fact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>