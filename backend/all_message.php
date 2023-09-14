<?php
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_all_message_query = "SELECT * FROM pro_messages";
$message_query_run = mysqli_query($db_con, $select_all_message_query);
$serial = 1;
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['fact_delete_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['fact_delete_success_msg'];?></h5>
                <?php endif; unset($_SESSION['fact_delete_success_msg']);?>
                <h5 class="card-title"> All Messages </h5>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($message_query_run as $message_items) : ?>
                        <tr>
                            <td><?= $serial++; ?></td>
                            <td><?= $message_items['your_name'];?></td>
                            <td><?= $message_items['your_email'];?></td>
                            <td><?= mb_strimwidth($message_items['message'], 0, 80, '...');?></td>

                            <td>
                            <a href="view_message.php?id=<?=$message_items['id']?>" class="text-info h4" style="background: #61acfc;color: #fff !important;padding: 6px 10px;border-radius: 10px"><i class="fa-regular fa-eye"></i></a>
                        
                            <a href="delete_message.php?id=<?=$message_items['id']?>" class="text-danger h4" style="background: #f00;color: #fff !important;padding: 6px 10px;border-radius: 10px;"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
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