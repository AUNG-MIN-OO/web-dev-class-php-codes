<?php require_once "core/auth.php"?>
<?php require_once "core/isEditor&Admin.php"?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
<!--                <li class="breadcrumb-item"><a href="--><?php //echo $url; ?><!--/category_list.php">Category List</a></li>-->
                <li class="breadcrumb-item active" aria-current="page">Category Menu</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12 col-xl-8">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-layers text-primary"></i>
                        Manage Category
                    </h4>
                    <div class="">
                        <a href="<?php echo $url; ?>/item_list.php" class="btn btn-outline-primary">
                            <i class="feather-list"></i>
                        </a>
                        <a href="#" class="btn btn-outline-secondary full-screen-btn maximize-btn">
                                <i class="feather-maximize-2"></i>
                        </a>
                    </div>
                </div>
                <hr>
                <?php
                    if (isset($_POST['addCat'])){
                        categoryAdd();
                    }
                ?>
                <form method="post">

                    <div class="form-inline w-100 mb-3">
                        <input type="text" class="form-control mr-3 w-50" name="title">
                        <button class="btn btn-primary" name="addCat">
                            Add Category
                        </button>
                    </div>

                </form>
                <hr>
                <?php include'category_list.php'; ?>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<!--<script>-->
<!--    $(".table").dataTable({-->
<!--        "order" : [[0, "desc"]]-->
<!--    });-->
<!--</script>-->

