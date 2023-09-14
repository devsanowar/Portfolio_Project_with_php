<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$id = $_GET['id'];
$select_about_data = "SELECT * FROM pro_abouts WHERE id = $id";
$about_data_query_run = mysqli_query($db_con, $select_about_data);
$after_fetch_assoc = mysqli_fetch_assoc($about_data_query_run);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['about_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['about_success_msg'];?></h5>
                <?php endif; unset($_SESSION['about_success_msg']);?>
                <h5 class="card-title">Add About <span style="float:right"><a href="manage_about.php" class="btn btn-primary btn btn-sm">Manage About</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="update_about_post.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $after_fetch_assoc['id']?>">
                        <div class="example-content">
                            <label class="form-label">About description</label>
                            <textarea id="summernote" name="about_description"><?= $after_fetch_assoc['about_description']?></textarea>
                        </div>
                        
                        <div class="example-content">
                        <h4>SSC</h4>
                        <div style="width: 2%;height: 4px;background: #2269F5;margin: 0px 0px 8px 2px;"></div>
                            <label class="form-label">Passing Year</label>
                            <input type="text" class="form-control" name="ssc_passing_year" value="<?= $after_fetch_assoc['ssc_passing_year']?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="example-content">
                                <label class="form-label">SSC Certificate Name</label>
                                <input type="text" class="form-control" name="ssc_certificate_name" value="<?= $after_fetch_assoc['ssc_certificate_name']?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="example-content">
                                <label class="form-label">SSC Grade (80-100)</label>
                                <input type="text" class="form-control" name="ssc_grade" value="<?= $after_fetch_assoc['ssc_grade']?>">
                                </div>
                            </div>
                        </div>
                        
                        <div class="example-content">
                        <h4>HSC</h4>
                        <div style="width: 2%;height: 4px;background: #2269F5;margin: 0px 0px 8px 2px;"></div>
                            <label class="form-label">Passing Year</label>
                            <input type="text" class="form-control" name="hsc_passing_year" value="<?= $after_fetch_assoc['hsc_passing_year']?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="example-content">
                                <label class="form-label">HSC Certificate Name</label>
                                <input type="text" class="form-control" name="hsc_certificate_name" value="<?= $after_fetch_assoc['hsc_certificate_name']?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="example-content">
                                <label class="form-label">HSC Grade (80-100)</label>
                                <input type="text" class="form-control" name="hsc_grade" value="<?= $after_fetch_assoc['hsc_grade']?>">
                                </div>
                            </div>
                        </div>
                        

                        <div class="example-content">
                        <h4>Honor's</h4>
                        <div style="width: 2%;height: 4px;background: #2269F5;margin: 0px 0px 8px 2px;"></div>
                            <label class="form-label">Passing Year</label>
                            <input type="text" class="form-control" name="honors_passing_year" value="<?= $after_fetch_assoc['honors_passing_year']?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="example-content">
                                <label class="form-label">Honor's Certificate Name</label>
                                <input type="text" class="form-control" name="honors_certificate_name" value="<?= $after_fetch_assoc['honors_certificate_name']?>">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="example-content">
                                <label class="form-label">Honor's Grade (80-100)</label>
                                <input type="text" class="form-control" name="honors_grade" value="<?= $after_fetch_assoc['honors_grade']?>">
                                </div>
                            </div>
                        </div>
                        

                        <div class="example-content">
                            <label class="form-label">Add about Photo</label>
                            <input type="file" class="form-control" name="about_image">
                            <img src="assets/images/about_photo/<?= $after_fetch_assoc['about_image']?>" alt="about_image" width="80" class="mt-2">
                        </div>

                        <div class="example-content">
                            <label class="form-label">About Status</label>
                            <select class="form-control" name="about_status" value="<?= $after_fetch_assoc['about_status']?>">
                                <option <?php if($after_fetch_assoc['about_status'] == 'active') : echo 'selected'; endif;?> value="active">Active</option>
                                <option <?php if($after_fetch_assoc['about_status'] != 'active') : echo 'selected'; endif;?> value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_about_btn">Add About</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>