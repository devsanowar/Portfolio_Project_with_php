<?php 
session_start();
require_once('header.php');
require_once('../config/db.php');

$id = $_GET['id'];
$select_messages = "SELECT message FROM pro_messages WHERE id=$id";
$msg_query_run = mysqli_query($db_con, $select_messages);
$message_fetch_assoc = mysqli_fetch_assoc($msg_query_run);
?>

<div class="row">
    <div class="col-md-8 col-lg-8">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">VIEW PROFILE</h5>
            </div>
            <div class="card-body">
                <div class="example-container">
                    <div class="p-3">
                        <p><?= $message_fetch_assoc['message']?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>