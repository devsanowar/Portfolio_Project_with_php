<?php 
session_start();
require_once('header.php');
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['contact_info_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['contact_info_success_msg'];?></h5>
                <?php endif; unset($_SESSION['contact_info_success_msg']);?>
                <h5 class="card-title">Add Contact Info <span style="float:right"><a href="manage_contact_info.php" class="btn btn-primary btn btn-sm">Manage Contact Info</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_contact_info_post.php" method="POST">
                        <div class="example-content">
                            <label class="form-label">Contact info</label>
                            <textarea id="summernote" name="contact_info"></textarea>
                        </div>
                        <div class="example-content">
                            <label class="form-label">Office Location</label>
                            <input type="text" class="form-control" name="office_location">
                        </div>                     
                        <div class="example-content">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" name="address">
                        </div>  
                        <div class="example-content">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone">
                        </div> 
                        <div class="example-content">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div> 
                        <div class="example-content">
                            <label class="form-label">Contact Status</label>
                            <select class="form-control" name="contact_status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_contact_btn">Add Contact info</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>