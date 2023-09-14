<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_copyright_text = "SELECT * FROM pro_copyright";
$copyright_text_run = mysqli_query($db_con, $select_copyright_text);
$copyright_fetch_assoc = mysqli_fetch_assoc($copyright_text_run);

$id = $copyright_fetch_assoc['id'];

$edit_copyright="SELECT * FROM pro_copyright WHERE id=$id";
$edit_copyright_query_run = mysqli_query($db_con, $edit_copyright);
$after_fetch_assoc = mysqli_fetch_assoc($edit_copyright_query_run);
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">Update Copyright Text</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="update_copyright_post.php" method="POST">
                        <input type="hidden" name="id" value="<?=$after_fetch_assoc['id']?>">
                        <div class="example-content">
                            <label class="form-label">Copyright Text</label>
                            <input type="text" class="form-control" name="copyright_text" value="<?=$after_fetch_assoc['copyright_text']?>">
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="update_copyright_btn">Update Copyright text</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>