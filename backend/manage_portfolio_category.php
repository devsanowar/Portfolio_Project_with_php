<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

// Category show query
$select_category = "SELECT * FROM pro_portfolio_categories";
$category_query_run = mysqli_query($db_con, $select_category);
$serial=1;
?>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['success_msg'];?></h5>
                <?php endif; unset($_SESSION['success_msg']);?>
                <h2 style="font-size: 24px;" class="card-title">Manage Portfolio Category Data <span><a href="add_portfolio_category.php" class="btn btn-primary btn-sm" style="float: right;">Add New</a></span></h2>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($category_query_run as $category_items) :?>
                            <tr>
                            <td><?= $serial++;?></td>
                            <td><?= $category_items['category_name']; ?></td>
                            <td><?= $category_items['category_status']; ?></td>
                            <td>
                                <a href="edit_portfolio_category.php?id=<?=$category_items['id'];?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                                <a href="delete_portfolio_category.php?id=<?=$category_items['id'];?>" class="text-danger h4"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Category Name</th>
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