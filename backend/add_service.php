<?php
session_start();
require_once('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['service_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['service_success_msg'];?></h5>
                <?php endif; unset($_SESSION['service_success_msg']);?>

                <?php if (isset($_SESSION['service_error_msg'])) : ?>
                    <h5 class="text-danger"><?=$_SESSION['service_error_msg'];?></h5>
                <?php endif; unset($_SESSION['service_error_msg']);?>
                <h5 class="card-title">Add Services</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_service_post.php" method="POST">
                        <div class="example-content">
                            <label class="form-label">Service Title</label>
                            <input type="text" class="form-control" name="service_title">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Service description</label>
                            <textarea id="summernote" name="service_description"></textarea>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Service Icon</label>
                            <input type="text" class="form-control" name="service_icon">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="service_status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_service_btn">Add Service</button>
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