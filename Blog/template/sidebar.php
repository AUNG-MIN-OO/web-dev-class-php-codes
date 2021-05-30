<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 myshop-sticky">
        <div class="d-flex align-items-center">
            <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                <i class="feather-shopping-bag text-white h4 mb-0"></i>
            </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">My Shop</span>
        </div>
        <button class="hide-sidebar-btn btn btn-light d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/dashboard.php" class="menu-item-link">
                    <span>
                        <i class="feather-home"></i>
                        Dashboard
                    </span>
                </a>
            </li>

            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/index.php" class="menu-item-link">
                    <span>
                        <i class="feather-layout"></i>
                        My WebPage
                    </span>
                </a>
            </li>
            
            <li class="menu-item">
                <a href="<?php echo $url; ?>/wallet.php" class="menu-item-link">
                    <span>
                        <i class="feather-dollar-sign"></i>
                        Wallet
                    </span>
                </a>
            </li>
            <li class="menu-spacer">

            </li>
            <!-- category start -->
            <li class="menu-title">
                <span>Manage Post</span>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_add.php" class="menu-item-link">
                    <span>
                        <i class="feather-plus-circle"></i>
                        Add Post
                    </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/post_list.php" class="menu-item-link">
                    <span>
                        <i class="feather-list"></i>
                        Post List
                    </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php echo countTotal('posts'); ?>
                    </span>
                </a>
            </li>
            <li class="menu-spacer">

            <?php if($_SESSION['user']['role'] <= 1){ ?>

            <li class="menu-title">
                <span>Manage Category</span>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/category_add.php" class="menu-item-link">
                    <span>
                        <i class="feather-layers"></i>
                        Category Manager
                    </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php echo countTotal('categories'); ?>
                    </span>
                </a>
            </li>
            <li class="menu-spacer">
                <!-- category end              -->

            <!-- user start -->
            <?php if($_SESSION['user']['role'] <= 1){ ?>

                <li class="menu-title">
                <span>Manage User</span>
            </li>
            <li class="menu-item">
                <a href="<?php echo $url; ?>/user_list.php" class="menu-item-link">
                    <span>
                        <i class="feather-user"></i>
                        User Manager
                    </span>
                    <span class="badge badge-pill bg-white shadow-sm text-primary">
                        <?php echo countTotal('users'); ?>
                    </span>
                </a>
            </li>
            <li class="menu-spacer">

            <!-- user end -->
            
            <?php } ?>

            <?php } ?>

            <li class="menu-item">
                <a href="<?php echo $url; ?>/logout.php" class="btn btn-danger w-100 mt-2">

                    <i class="feather-log-out"></i>
                    Log Out

                </a>
            </li>
        </ul>
    </div>
</div>