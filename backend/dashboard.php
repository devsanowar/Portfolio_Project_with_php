<?php
session_start();

if (!isset($_SESSION['login_email'])) {
    header('Location:404.php');
}
require_once('header.php');
require_once('../config/db.php');
?>

<!--Show Total users Query-->
<?php
    $select_count_all_users ="SELECT COUNT(*) AS 'total_users' FROM pro_users";
    $run_query = mysqli_query($db_con, $select_count_all_users);
    $users_fetch_assoc = mysqli_fetch_assoc($run_query);
?>

<?php
    $select_count_all_portfolio ="SELECT COUNT(*) AS 'total_portfolio' FROM pro_portfolios";
    $portfolio_run_query = mysqli_query($db_con, $select_count_all_portfolio);
    $portfolio_fetch_assoc = mysqli_fetch_assoc($portfolio_run_query);
?>
<!--Show Total users Query-->




<div class="col">
    <div class="page-description">
        <h1 class="mb-2">Dashboard</h1>
        <h4>Name : <?=$_SESSION['login_name'];?></h4>
        <h4>Email : <?=$_SESSION['login_email'];?></h4>
        <h4>Id : <?=$_SESSION['login_id'];?></h4>
    </div>
</div>
</div>
<div class="row">
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-primary">
                        <i class="material-icons-outlined">paid</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">All Portfolio</span>
                        <span class="widget-stats-amount"><?= $portfolio_fetch_assoc['total_portfolio']?></span>
                    </div>
                    <div class="widget-stats-indicator widget-stats-indicator-negative align-self-start">
                        <i class="material-icons">keyboard_arrow_down</i> 4%
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-warning">
                        <i class="material-icons-outlined">person</i>
                    </div>
                    
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Total Users</span>
                        <span class="widget-stats-amount"><?= $users_fetch_assoc['total_users'];?></span>
                    </div>
                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                        <i class="material-icons">keyboard_arrow_up</i> 12%
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card widget widget-stats">
            <div class="card-body">
                <div class="widget-stats-container d-flex">
                    <div class="widget-stats-icon widget-stats-icon-danger">
                        <i class="material-icons-outlined">file_download</i>
                    </div>
                    <div class="widget-stats-content flex-fill">
                        <span class="widget-stats-title">Downloads</span>
                        <span class="widget-stats-amount">140,390</span>
                        <span class="widget-stats-info">87 items downloaded</span>
                    </div>
                    <div class="widget-stats-indicator widget-stats-indicator-positive align-self-start">
                        <i class="material-icons">keyboard_arrow_up</i> 7%
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card widget widget-list" style="overflow: scroll;height:462px;">
            <div class="card-header">
                <h5 class="card-title">All Users list<span class="badge badge-success badge-style-light">Total : <?= $users_fetch_assoc['total_users'];?></span></h5>
            </div>
            <div class="card-body">
                <ul class="widget-list-content list-unstyled">
                    <?php 
                        $select_all_users = "SELECT id,name,email FROM pro_users";
                        $run_query = mysqli_query($db_con, $select_all_users);
                        foreach ($run_query as $key => $users) : 
                        ?> 
                        <li class="widget-list-item widget-list-item-green">
                        <span class="widget-list-item-icon" style="line-height: 45px;"><?=$users['id'];?></span>
                        <span class="widget-list-item-description">
                            <a href="#" class="widget-list-item-description-title">
                                <?=$users['name'];?>
                            </a>
                            <span class="widget-list-item-description-subtitle">
                            <?=$users['email'];?>
                            </span>
                        </span>
                    </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card widget widget-list">
            <div class="card-header">
                <h5 class="card-title">Todo<span class="badge badge-success badge-style-light">14 completed</span></h5>
            </div>
            <div class="card-body">
                <span class="text-muted m-b-xs d-block">showing 5 out of 23 active tasks.</span>
                <ul class="widget-list-content list-unstyled">
                    <li class="widget-list-item widget-list-item-green">
                        <span class="widget-list-item-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="">
                            </div>
                        </span>
                        <span class="widget-list-item-description">
                            <a href="#" class="widget-list-item-description-title">
                                Dashboard UI optimisations
                            </a>
                            <span class="widget-list-item-description-subtitle">
                                Oskar Hudson
                            </span>
                        </span>
                    </li>
                    <li class="widget-list-item widget-list-item-blue">
                        <span class="widget-list-item-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="" checked>
                            </div>
                        </span>
                        <span class="widget-list-item-description">
                            <a href="#" class="widget-list-item-description-title">
                                Mailbox cleanup
                            </a>
                            <span class="widget-list-item-description-subtitle">
                                Woodrow Hawkins
                            </span>
                        </span>
                    </li>
                    <li class="widget-list-item widget-list-item-purple">
                        <span class="widget-list-item-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="" checked>
                            </div>
                        </span>
                        <span class="widget-list-item-description">
                            <a href="#" class="widget-list-item-description-title">
                                Header scroll bugfix
                            </a>
                            <span class="widget-list-item-description-subtitle">
                                Sky Meyers
                            </span>
                        </span>
                    </li>
                    <li class="widget-list-item widget-list-item-yellow">
                        <span class="widget-list-item-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="">
                            </div>
                        </span>
                        <span class="widget-list-item-description">
                            <a href="#" class="widget-list-item-description-title">
                                Localization for file manager
                            </a>
                            <span class="widget-list-item-description-subtitle">
                                Oskar Hudson
                            </span>
                        </span>
                    </li>
                    <li class="widget-list-item widget-list-item-red">
                        <span class="widget-list-item-check">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="" checked>
                            </div>
                        </span>
                        <span class="widget-list-item-description">
                            <a href="#" class="widget-list-item-description-title">
                                New E-commerce UX/UI design
                            </a>
                            <span class="widget-list-item-description-subtitle">
                                Oskar Hudson
                            </span>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php');?>