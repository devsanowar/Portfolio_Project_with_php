<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_about = "SELECT * FROM pro_abouts";
$about_query_run = mysqli_query($db_con, $select_about);
$about_serial = 1;
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['fact_delete_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['fact_delete_success_msg'];?></h5>
                <?php endif; unset($_SESSION['fact_delete_success_msg']);?>
                <h5 class="card-title">Manage About</h5>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>About Description</th>
                            <th>About Image</th>
                            <th>About Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($about_query_run as $about_row) : ?>
                        <tr>
                            <td><?= $about_serial++; ?></td>
                            <td><?= $about_row['about_description'];?></td>
                            <td><img src="<?php echo 'assets/images/about_photo/'.$about_row['about_image']?>" alt="" width="80"></td>
                            <td><?= $about_row['about_status'];?></td>
                            <td>
                                <a href="edit_about.php?id=<?=$about_row['id']?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                                
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>SN</th>
                        <th>About Description</th>
                        <th>About Image</th>
                        <th>About Status</th>
                        <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>