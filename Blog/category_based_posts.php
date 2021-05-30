<?php include_once "frontPanel/head.php"; ?>
<!-- <title>Home</title> -->
<?php include_once "frontPanel/side_header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <?php foreach (fPostsByCat($_GET['category_id']) as $p) { ?>
                <?php include "single.php"; ?>
            <?php } ?>

        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>

<?php include_once "frontPanel/footer.php"; ?>