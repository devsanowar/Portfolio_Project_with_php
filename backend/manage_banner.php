<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_all_facts_query = "SELECT * FROM pro_banners";
$select_all_banner_query_run = mysqli_query($db_con, $select_all_facts_query);
$banners_serial = 1;
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['fact_delete_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['fact_delete_success_msg'];?></h5>
                <?php endif; unset($_SESSION['fact_delete_success_msg']);?>
                <h5 class="card-title">Banner</h5>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Banner title</th>
                            <th>Banner description</th>
                            <th>Portfolio URL</th>
                            <th>Banner Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_all_banner_query_run as $banner_items) : ?>
                        <tr>
                            <td><?= $banners_serial++; ?></td>
                            <td><?= $banner_items['banner_title'];?></td>
                            <td><?= $banner_items['banner_description'];?></td>
                            <td><?= $banner_items['portfolio_url'];?></td>
                            <td><img src="<?php echo 'assets/images/banner_photo/'.$banner_items['banner_image']?>" alt="" width="80"></td>
                            <td>
                            <a href="edit_banner.php?id=<?=$banner_items['id']?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                        
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                    <tr>
                            <th>SN</th>
                            <th>Banner title</th>
                            <th>Banner description</th>
                            <th>Portfolio URL</th>
                            <th>Banner Image</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>