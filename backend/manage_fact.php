<?php
session_start();
require_once('header.php');
require_once('../config/db.php');

$select_all_facts_query = "SELECT * FROM pro_facts";
$select_all_fact_query_run = mysqli_query($db_con, $select_all_facts_query);
$facts_serial = 1;
?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?php if (isset($_SESSION['fact_delete_success_msg'])) : ?>
                    <h5 class="text-success"><?=$_SESSION['fact_delete_success_msg'];?></h5>
                <?php endif; unset($_SESSION['fact_delete_success_msg']);?>
                <h5 class="card-title">Fact Item <span><a href="add_fact.php" class="btn btn-primary btn btn-sm">Add Fact</a></span></h5>
            </div>
            <div class="card-body">
                <table id="datatable1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Fact Title</th>
                            <th>Fact Value</th>
                            <th>Fact Icon</th>
                            <th>Fact Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($select_all_fact_query_run as $fact_items) : ?>
                        <tr>
                            <td><?= $facts_serial++; ?></td>
                            <td><?= $fact_items['fact_title'];?></td>
                            <td><?= $fact_items['fact_value'];?></td>
                            <td><?= $fact_items['fact_icon'];?></td>
                            <td><?= $fact_items['fact_status'];?></td>
                            <td>
                            <a href="edit_fact.php?id=<?=$fact_items['id']?>" class="text-info h4"><i class="fa-solid fa-pen-to-square"></i></a>
                            | 
                            <a href="delete_fact.php?id=<?=$fact_items['id']?>" class="text-danger h4"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Fact Title</th>
                            <th>Fact Value</th>
                            <th>Fact Icon</th>
                            <th>Fact Status</th>
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