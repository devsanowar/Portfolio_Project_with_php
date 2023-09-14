<?php
session_start();
require_once('header.php');
require_once('../config/db.php');

// Edit fact query
$id = $_REQUEST['id'];
$edit_fact_query = "SELECT * FROM pro_facts WHERE id='$id'";
$edit_fact_query_run = mysqli_query($db_con, $edit_fact_query);
$fact_fetch_assoc = mysqli_fetch_assoc($edit_fact_query_run);

// Update facts query
if(isset($_REQUEST['update_fact_btn'])){
    $id = $_REQUEST['id'];
    $fact_title = $_POST['fact_title'];
    $fact_value = $_POST['fact_value'];
    $fact_icon = $_POST['fact_icon'];
    $fact_status = $_POST['fact_status'];

    $update_fact_query = "UPDATE pro_facts SET fact_title='$fact_title', fact_value='$fact_value', fact_icon='$fact_icon', fact_status='$fact_status' WHERE id = '$id'";
    $update_query_run = mysqli_query($db_con, $update_fact_query);
    if($update_query_run){
        echo "<script>window.location.href='manage_fact.php'</script>";
    }
}

?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['fact_insert_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['fact_insert_success_msg'];?></h5>
                <?php endif; unset($_SESSION['fact_insert_success_msg']);?>
                <h5 class="card-title">Update Fact</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $fact_fetch_assoc['id']?>">
                        <div class="example-content">
                            <label class="form-label">Fact Title</label>
                            <input type="text" class="form-control" name="fact_title" value="<?= $fact_fetch_assoc['fact_title']?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Fact Value</label>
                            <input type="text" class="form-control" name="fact_value" value="<?= $fact_fetch_assoc['fact_value']?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Fact Icon</label>
                            <input type="text" class="form-control" name="fact_icon" value="<?= $fact_fetch_assoc['fact_icon']?>">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Fact Status</label>
                            <select class="form-control" name="fact_status">
                                <option <?php if($fact_fetch_assoc['fact_status'] == 'active') : echo 'selected'; endif;?> value="active">Active</option>
                                <option <?php if($fact_fetch_assoc['fact_status'] != 'active') : echo 'selected'; endif;?> value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_fact_btn">Update Fact</button>
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