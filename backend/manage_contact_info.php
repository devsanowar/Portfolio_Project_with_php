<?php
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_contact_info = "SELECT * FROM pro_contact_infos";
$contact_info_query_run = mysqli_query($db_con, $select_contact_info);
$serial = 1;
?>

<div class="row">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['update_contact_info_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['update_contact_info_msg'];?></h5>
                <?php endif; unset($_SESSION['update_contact_info_msg']);?>
                <h5 class="card-title">Contact Info <span><a href="add_contact_info.php" class="btn btn-primary btn btn-sm">Add Contact Info</a></span></h5>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Contact info</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Contact Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($contact_info_query_run as $contact_info) : ?>
                        <tr>
                            <td><?= $serial++; ?></td>
                            <td><?= $contact_info['contact_info'];?></td>
                            <td><?= $contact_info['address'];?></td>
                            <td><?= $contact_info['phone'];?></td>
                            <td><?= $contact_info['email'];?></td>
                            <td><?= $contact_info['contact_status'];?></td>
                            <td>
                            <a href="edit_contact_info.php?id=<?=$contact_info['id']?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Contact info</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Contact Status</th>
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