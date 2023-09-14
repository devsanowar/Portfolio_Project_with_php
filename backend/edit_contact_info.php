<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');
$id = $_GET['id'];
$contact_info_by_id = "SELECT * FROM pro_contact_infos WHERE id = $id";
$contact_info_query_run = mysqli_query($db_con, $contact_info_by_id);
$contact_info_fetch_assoc = mysqli_fetch_assoc($contact_info_query_run);
?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['contact_info_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['contact_info_success_msg'];?></h5>
                <?php endif; unset($_SESSION['contact_info_success_msg']);?>
                <h5 class="card-title">Edit Contact Info <span style="float:right"><a href="manage_contact_info.php" class="btn btn-primary btn btn-sm">Manage Contact Info</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="update_contact_info_post.php" method="POST">
                        <input type="hidden" name="id" value="<?=$contact_info_fetch_assoc['id']?>">
                        <div class="example-content">
                            <label class="form-label">Contact info</label>
                            <textarea id="summernote" name="contact_info"><?=$contact_info_fetch_assoc['contact_info']?></textarea>
                        </div>
                        <div class="example-content">
                            <label class="form-label">Office Location</label>
                            <input type="text" class="form-control" value="<?=$contact_info_fetch_assoc['office_location']?>" name="office_location">
                        </div>                     
                        <div class="example-content">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" value="<?=$contact_info_fetch_assoc['address']?>" name="address">
                        </div>  
                        <div class="example-content">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" value="<?=$contact_info_fetch_assoc['phone']?>" name="phone">
                        </div> 
                        <div class="example-content">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="<?=$contact_info_fetch_assoc['email']?>" name="email">
                        </div> 
                        <div class="example-content">
                            <label class="form-label">Contact Status</label>
                            <select class="form-control" name="contact_status" value="<?=$contact_info_fetch_assoc['contact_status']?>">
                                <option <?php if($contact_info_fetch_assoc['contact_status'] == 'active') : echo 'selected'; endif;?> value="active">Active</option>
                                <option <?php if($contact_info_fetch_assoc['contact_status'] != 'active') : echo 'selected'; endif;?> value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_contact_btn">Update Contact info</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>