<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

// Testimonial show query
$select_all_testimonial = "SELECT * FROM pro_testimonials";
$testimonial_query_run = mysqli_query($db_con, $select_all_testimonial);
$serial=1;
?>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['delete_success_message'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['delete_success_message'];?></h5>
                <?php endif; unset($_SESSION['delete_success_message']);?>
                <h2 style="font-size: 24px;" class="card-title">Manage Testimonial Data <span><a href="add_testimonial.php" class="btn btn-primary btn-sm" style="float: right;">Add New</a></span></h2>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Testimonial quote</th>
                            <th>Client Name</th>
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($testimonial_query_run as $testimonial_items) :?>
                            <tr>
                            <td><?= $serial++;?></td>
                            <td><img src="assets/images/testimonial_photo/<?= $testimonial_items['client_photo']; ?>" alt="" width="80"></td>
                            <td><?= $testimonial_items['testimonial_quote']; ?></td>
                            <td><?= $testimonial_items['client_name']; ?></td>
                            <td><?= $testimonial_items['designation']; ?></td>
                            <td><?= $testimonial_items['testimonial_status']; ?></td>
                            <td>
                                <a href="edit_testimonial.php?id=<?=$testimonial_items['id'];?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                <a href="delete_testimonial.php?id=<?=$testimonial_items['id'];?>" class="text-danger h4"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Service Title</th>
                            <th>Service Description</th>
                            <th>Service Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>