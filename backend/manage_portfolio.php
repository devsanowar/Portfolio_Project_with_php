<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_portfolio = "SELECT * FROM pro_portfolios";
$portfolio_query_run = mysqli_query($db_con, $select_portfolio);
$serial=1;
?>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                
                <?php if (isset($_SESSION['update_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['update_success_msg'];?></h5>
                <?php endif; unset($_SESSION['update_success_msg']);?>

                <h2 style="font-size: 24px;" class="card-title">Manage Portfolio With Category Data <span><a href="add_portfolio.php" class="btn btn-primary btn-sm" style="margin-right:5px;">Add New</a></span></h2>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Portfolio Image</th>
                            <th>Category ID</th>
                            <th>Portfolio Title</th>
                            <th>Portfolio description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($portfolio_query_run as $portfolio_items) :?>
                            <tr>
                            <td><?= $serial++;?></td>
                            <td><img src="assets/images/portfolio_photo/<?= $portfolio_items['portfolio_image']; ?>" alt="" width="80"></td>
                            <td><?= $portfolio_items['category_id']; ?></td>
                            <td><?= $portfolio_items['portfolio_title']; ?></td>
                            <td><?= $portfolio_items['portfolio_description']; ?></td>
                            <td><?= $portfolio_items['portfolio_status']; ?></td>
                            <td>
                                <a href="edit_portfolio.php?id=<?=$portfolio_items['id'];?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                                |
                                <a href="delete_portfolio.php?id=<?=$portfolio_items['id'];?>" class="text-danger h4"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                      <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>SN</th>
                            <th>Portfolio Image</th>
                            <th>Category ID</th>
                            <th>Portfolio Title</th>
                            <th>Portfolio description</th>
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