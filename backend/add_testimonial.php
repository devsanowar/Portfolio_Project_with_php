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
                <h5 class="card-title">Add Testimonial <span style="float:right"><a href="manage_testimonial.php" class="btn btn-primary btn btn-sm">Manage Testimonial</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_testimonial_post.php" method="POST" enctype="multipart/form-data">
                        <div class="example-content">
                            <label class="form-label">Testimonial Quote</label>
                            <textarea name="testimonial_quote" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Client Name</label>
                            <input type="text" class="form-control" name="client_name">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Client Photo</label>
                            <input type="file" class="form-control" name="client_photo">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Testimonial Status</label>
                            <select class="form-control" name="testimonial_status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_fact_btn">Add Testimonial</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>