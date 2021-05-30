<?php
session_start();
?>
<?php include_once "frontPanel/head.php"; ?>
<!-- <title>Home</title> -->
<?php include_once "frontPanel/side_header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="">
                <div class="dropdown mb-4 text-right">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="feather-calendar mr-2"></i>Sort News
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="?order_by=created_at&order_type=asc">
                            <i class="feather-arrow-down mr-2"></i>
                            Oldest to Newest
                        </a>
                        <a class="dropdown-item" href="?order_by=created_at&order_type=desc">
                            <i class="feather-arrow-up mr-2"></i>
                            Newest to Oldest
                        </a>
                        <a class="dropdown-item" href="?order_by=created_at&order_type=desc">
                            <i class="feather-list mr-2"></i>
                            Default
                        </a>
                    </div>
                </div>
                <?php

                if (isset($_GET['order_by']) && isset($_GET['order_type'])) {
                    $orderCol = @$_GET['order_by'];
                    $orderType = strtoupper(@$_GET['order_type']);
                    $posts = fPosts($orderCol, $orderType);
                } else {
                    $posts = fPosts();
                }


                foreach ($posts as $p) { ?>
                    <?php include "single.php"; ?>
                <?php } ?>
            </div>

        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>

<?php include_once "frontPanel/footer.php"; ?>