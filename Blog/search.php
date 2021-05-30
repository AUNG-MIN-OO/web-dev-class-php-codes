<?php include_once "frontPanel/head.php"; ?>
<!-- <title>Home</title> -->
<?php include_once "frontPanel/side_header.php"; ?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <div class="">
                <?php
                $result = fSearch($_POST['search_key']);
                if (count($result) == 0) {
                    echo alert("There is no result", "danger");
                }
                ?>
                <?php foreach ($result as $p) { ?>
                    <?php include "single.php"; ?>
                <?php } ?>
            </div>

        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>

<?php include_once "frontPanel/footer.php"; ?>