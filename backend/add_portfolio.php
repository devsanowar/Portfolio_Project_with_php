<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Add Portfolio <span style="float:right"><a href="manage_portfolio.php" class="btn btn-primary btn btn-sm">Manage Portfolio</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_portfolio_post.php" method="POST" enctype="multipart/form-data">
                        <?php 
                        $select_category = "SELECT * FROM pro_portfolio_categories WHERE category_status = 'active'";
                        $category_query_run = mysqli_query($db_con, $select_category);
                        ?>

                        <div class="example-content">
                            <label class="form-label">Portfolio Category</label>
                            <select class="form-control" name="category_id">
                                <option>Select Category....</option>
                                <?php foreach($category_query_run as $category_item) : ?>
                                <option value="<?= $category_item['id']?>"><?= $category_item['category_name']?></option>
                                <?php endforeach;?>
                            </select>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Title</label>
                            <input type="text" class="form-control" name="portfolio_title">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Slug</label>
                            <input type="text" class="form-control" name="portfolio_slug">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio description</label>
                            <textarea id="summernote" name="portfolio_description"></textarea>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Image</label>
                            <input type="file" class="form-control" name="portfolio_image">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Status</label>
                            <select class="form-control" name="portfolio_status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>


                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_portfolio_btn">Add Portfolio</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
require_once('footer.php');
?>