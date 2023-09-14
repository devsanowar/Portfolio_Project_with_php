<?php
session_start();
require_once('header.php');
require_once('../config/db.php');

$id = $_GET['id'];
$select_portfolio_data = "SELECT * FROM pro_portfolios WHERE id=$id";
$portfolio_query_run = mysqli_query($db_con, $select_portfolio_data);
$after_fetch_assoc = mysqli_fetch_assoc($portfolio_query_run);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Update Portfolio <span style="float:right"><a href="manage_portfolio.php" class="btn btn-primary btn btn-sm">Manage Portfolio</a></span></h5>
            </div>
            
            <div class="card-body">
                <div class="example-container">
                    <form action="update_portfolio_post.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$after_fetch_assoc['id']?>">    
                    <div class="example-content">
                            <label class="form-label">Portfolio Category</label>
                            <?php 
                                $select_all_category = "SELECT * FROM pro_portfolio_categories";
                                $category_query_run = mysqli_query($db_con, $select_all_category);
                            ?>
                            <select class="form-control" name="category_id">
                                <option>Select Category....</option>
                                <?php foreach($category_query_run as $category_items) : ?>
                                <option value="<?=$category_items['id'];?>" <?php if($category_items['id'] == $after_fetch_assoc['category_id']) : echo 'selected'; endif;?>>
                                    <?= $category_items['category_name']?>
                                </option>
                               <?php endforeach;?>
                            </select>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Title</label>
                            <input type="text" class="form-control" name="portfolio_title" value="<?= $after_fetch_assoc['portfolio_title']?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Slug</label>
                            <input type="text" class="form-control" name="portfolio_slug" value="<?= $after_fetch_assoc['portfolio_slug']?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio description</label>
                            <textarea id="summernote" name="portfolio_description"><?= $after_fetch_assoc['portfolio_description']?></textarea>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Image</label>
                            <input type="file" class="form-control" name="portfolio_image">
                            <img class="mt-2" src="assets/images/portfolio_photo/<?= $after_fetch_assoc['portfolio_image']?>" alt="" width="80">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio Status</label>
                            <select class="form-control" name="portfolio_status">
                                <option value="active" <?php if($after_fetch_assoc['portfolio_status'] == 'active') : echo 'selected'; endif;?>>Active</option>
                                <option value="deactive" <?php if($after_fetch_assoc['portfolio_status'] != 'active') : echo 'selected'; endif;?>>Deactive</option>
                            </select>
                        </div>

                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_portfolio_btn">Update Portfolio</button>
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