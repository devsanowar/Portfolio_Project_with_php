<?php 
session_start();
require_once('header.php');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['fact_insert_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['fact_insert_success_msg'];?></h5>
                <?php endif; unset($_SESSION['fact_insert_success_msg']);?>
                <h5 class="card-title">Add Fact <span style="float:right"><a href="manage_fact.php" class="btn btn-primary btn btn-sm">Manage Fact</a></span></h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <form action="add_fact_post.php" method="POST">
                        <div class="example-content">
                            <label class="form-label">Fact Title</label>
                            <input type="text" class="form-control" name="fact_title">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Fact Value</label>
                            <input type="text" class="form-control" name="fact_value">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Fact Icon</label>
                            <input type="text" class="form-control" name="fact_icon">
                        </div>

                        <div class="example-content">
                            <label class="form-label">Fact Status</label>
                            <select class="form-control" name="fact_status">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <div class="example-content">
                            <button type="submit" class="btn btn-primary" name="submit_fact_btn">Add Fact</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php');?>