<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

// Edit Query
$banner_id = $_REQUEST['id'];
$select_banner_data_query = "SELECT * FROM pro_banners WHERE id='$banner_id'";
$banner_query_run = mysqli_query($db_con, $select_banner_data_query);
$banner_final_fetch_assoc = mysqli_fetch_assoc($banner_query_run);

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['update_banner_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['update_banner_success_msg'];?></h5>
                <?php endif; unset($_SESSION['update_banner_success_msg']);?>

                <h5 class="card-title">Update Banner</h5>
            </div>

            <div class="card-body">
                <div class="example-container">
                    <form action="update_banner_post.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $banner_final_fetch_assoc['id'];?>">
                        <div class="example-content">
                            <label class="form-label">Banner Title</label>
                            <input type="text" class="form-control" name="banner_title" value="<?php echo $banner_final_fetch_assoc['banner_title'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Banner description</label>
                            <textarea name="banner_description" style="resize:none" class="form-control" rows="5"><?php echo $banner_final_fetch_assoc['banner_description'];?></textarea>
                            <!-- <textarea id="summernote" name="banner_description"></textarea> -->
                        </div>

                        <div class="example-content">
                            <label class="form-label">Facebook URL</label>
                            <input type="text" class="form-control" name="facebook_url" value="<?php echo $banner_final_fetch_assoc['facebook_url'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Instagram URL</label>
                            <input type="text" class="form-control" name="instagram_url" value="<?php echo $banner_final_fetch_assoc['instagram_url'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Linkedin URL</label>
                            <input type="text" class="form-control" name="linkedin_url" value="<?php echo $banner_final_fetch_assoc['linkedin_url'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Twitter URL</label>
                            <input type="text" class="form-control" name="twitter_url" value="<?php echo $banner_final_fetch_assoc['twitter_url'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Portfolio URL</label>
                            <input type="text" class="form-control" name="portfolio_url" value="<?php echo $banner_final_fetch_assoc['portfolio_url'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="banner_image" value="<?php echo 'assets/images/banner_photo/'.$banner_final_fetch_assoc['banner_image']?>">
                            <img class="mt-3" src="<?php echo 'assets/images/banner_photo/'.$banner_final_fetch_assoc['banner_image']?>" alt="" width="80" height="80">
                        </div>


                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_banner_btn">Update Banner</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>