<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

// Select All Services data
$service_data_select_query="SELECT * FROM pro_services;";
$view_service_data_query_run = mysqli_query($db_con, $service_data_select_query);
$serial = 1;
?>


<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['delete_success_message'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['delete_success_message'];?></h5>
                <?php endif; unset($_SESSION['delete_success_message']);?>

                <?php if (isset($_SESSION['update_service_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['update_service_success_msg'];?></h5>
                <?php endif; unset($_SESSION['update_service_success_msg']);?>

                <?php if (isset($_SESSION['update_service_error_msg'])) : ?>
                    <h5 class="text-danger"><?=$_SESSION['update_service_error_msg'];?></h5>
                <?php endif; unset($_SESSION['update_service_error_msg']);?>
                <h2 style="font-size: 24px;" class="card-title">Service Data</h2>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Service Title</th>
                            <th>Service Description</th>
                            <th>Service Icon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($view_service_data_query_run as $service_items) :?>
                            <tr>
                            <td><?= $serial++;?></td>
                            <td><?= $service_items['service_title']; ?></td>
                            <td><?= mb_strimwidth($service_items['service_description'], 0, 40, '....') ?></td>
                            <td><?= $service_items['service_icon']; ?></td>
                            <td><?= $service_items['service_status']; ?></td>
                            <td>
                                <a href="edit_service.php?id=<?=$service_items['id'];?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                                | 
                                <a href="delete_service.php?id=<?=$service_items['id'];?>" class="text-danger h4"><i class="fa-solid fa-trash-can"></i></a>
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