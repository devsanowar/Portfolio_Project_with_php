<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

// Edit query

$id = $_REQUEST['id'];
$edit_service_item_query = "SELECT * FROM pro_services WHERE id = '$id'";
$service_edit_query_run = mysqli_query($db_con, $edit_service_item_query);
$edit_final_assoc = mysqli_fetch_assoc($service_edit_query_run);


// Update Query

if(isset($_REQUEST['update_service_btn'])){
    $id = $_REQUEST['id'];
    $service_title = $_POST['service_title'];

    $service_description = $_POST['service_description'];
    $service_icon = $_POST['service_icon'];
    $service_status = $_POST['service_status'];


    $update_service_query = "UPDATE pro_services SET service_title='$service_title', service_description='$service_description', service_icon='$service_icon', service_status='$service_status' WHERE id='$id'";
    $update_query_run = mysqli_query($db_con, $update_service_query);
    if ($update_query_run) {
        echo "<script>window.location.href='manage_service.php'</script>";
    }
}

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
                <h5 class="card-title">Edit Service Item</h5>
            </div>




            <div class="card-body">
                <div class="example-container">
                    <form action="" method="POST">
                    <input name="id" type="hidden" value="<?= $edit_final_assoc['id'];?>" />
                        <div class="example-content">
                            <label class="form-label">Service Title</label>
                            <input type="text" class="form-control" name="service_title" value="<?= $edit_final_assoc['service_title'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Service description</label>
                            <textarea id="summernote" name="service_description"><?= $edit_final_assoc['service_description'];?></textarea>
                        </div>

                        <div class="example-content">
                            <label class="form-label">Service Icon</label>
                            <input type="text" class="form-control" name="service_icon" value="<?= $edit_final_assoc['service_icon'];?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="service_status" >
                                
                                <option value="active" <?php if($edit_final_assoc['service_status'] == 'active'){ echo 'selected'; }?> >Active</option>

                                <option value="deactive" <?php if($edit_final_assoc['service_status'] == 'deactive'){ echo 'selected'; }?> >DeActive</option>

                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_service_btn">Update Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once('footer.php');?>