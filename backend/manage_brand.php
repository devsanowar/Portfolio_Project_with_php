<?php
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_brands_query = "SELECT * FROM pro_brands";
$brand_query_run = mysqli_query($db_con, $select_brands_query);
$brand_serial = 1;
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h5 class="card-title">All Brands <span><a href="add_brand.php" class="btn btn-primary btn btn-sm">Add Brand</a></span></h5>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Brand Image</th>
                            <th>Brand Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($brand_query_run as $brand_items) : ?>
                        <tr>
                            <td><?= $brand_serial++; ?></td>
                            <td><img src="assets/images/brand_photo/<?= $brand_items['brand_image'];?>" alt=""></td>
                            <td><?= $brand_items['brand_status'];?></td>
                            <td>
                            <a href="edit_brand.php?id=<?=$brand_items['id']?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                            | 
                            <a href="delete_brand.php?id=<?=$brand_items['id']?>" class="text-danger h4"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Brand Image</th>
                            <th>Brand Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<?php
require_once('footer.php');
?>