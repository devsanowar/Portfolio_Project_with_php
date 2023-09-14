<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

// Edit Testimonial Query
$id = $_GET['id'];
$edit_testimonial = "SELECT * FROM pro_testimonials WHERE id=$id";
$edit_query_run = mysqli_query($db_con, $edit_testimonial);
$after_fetch_assoc = mysqli_fetch_assoc($edit_query_run);

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Update Testimonial<span style="float:right"><a href="manage_testimonial.php" class="btn btn-primary btn btn-sm">Manage Testimonial</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="update_testimonial.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $after_fetch_assoc['id'];?>">
                        <div class="example-content">
                            <label class="form-label">Testimonial Quote</label>
                            <textarea name="testimonial_quote" class="form-control" rows="5"><?= $after_fetch_assoc['testimonial_quote'];?></textarea>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" name="client_name" value="<?= $after_fetch_assoc['client_name'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation" value="<?= $after_fetch_assoc['designation'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Client Photo</label>
                            <input type="file" class="form-control" name="client_photo">
                            <img class="mt-2" src="assets/images/testimonial_photo/<?= $after_fetch_assoc['client_photo'];?>" alt="" width="80">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Testimonial Status</label>
                            <select class="form-control" name="testimonial_status">
                                <option value="active" <?php if($after_fetch_assoc['testimonial_status'] == 'active') : echo 'selected'; endif;?>>Active</option>
                                <option value="deactive" <?php if($after_fetch_assoc['testimonial_status'] != 'active') : echo 'selected'; endif;?>>Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_testimonial_btn">Update Testimonial</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>