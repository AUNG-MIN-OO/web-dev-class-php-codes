<?php
    session_start();
?>
<?php include_once "frontPanel/head.php"; ?>
<!-- <title>Home</title> -->
<?php include_once "frontPanel/side_header.php"; ?>
<?php

if (isset($_GET['id'])){
    $id = $_GET['id'];
    $current = post($id);
}else{
    linkTo("index.php");
}

$id = $_GET['id'];
$current = post($id);
$currentCat = $current['category_id'];

if($_SESSION['user']['id']){
    $userId = $_SESSION['user']['id'];
}else{
    $userId = 0;
}

viewerRecord($userId,$id,$_SERVER['HTTP_USER_AGENT']);

?>

<div class="container">
    <div class="row">
        <div class="col-12 col-md-8">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-4 bg-dark1">
                    <li class="breadcrumb-item"><a href="<?php echo $url; ?>/index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Post Details</li>
                </ol>
            </nav>
            <div class="card posts-card mb-4">
                <div class="card-body">
                    <div class="detail-post">

                        <h4>
                            <?php echo $current['title'] ?>
                        </h4>
                        <div class="my-3 text-secondary">
                            <i class="feather-user text-secondary"></i>
                            <?php echo user($current['user_id'])['name']; ?>
                            <i class="feather-layers"></i>
                            <?php echo category($current['category_id'])['title']; ?>
                            <i class="feather-calendar text-secondary"></i>
                            <?php echo date("j M Y", strtotime($current['created_at'])); ?>
                        </div>
                        <div class="text-black-80">
                            <?php echo html_entity_decode($current['description'], ENT_QUOTES) ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach (fPostsByCat($currentCat, 2, $id) as $p) { ?>
                    <div class="col-12 col-md-6">
                        <div class="card shadow-sm mb-4 post">
                            <div class="card-body"> 
                                <a href="detail.php?id=<?php echo $p['id']; ?>">
                                    <h4><?php echo $p['title']; ?></h4>
                                </a>
                                <div class="my-3 text-secondary">
                                    <i class="feather-user text-light"></i>
                                    <?php echo user($p['user_id'])['name']; ?>
                                    <i class="feather-layers"></i>
                                    <?php echo category($p['category_id'])['title']; ?>
                                    <i class="feather-calendar text-light"></i>
                                    <?php echo date("j M Y", strtotime($p['created_at'])); ?>
                                </div>
                                <p class=""><?php echo short(strip_tags(html_entity_decode($p['description'])), 200); ?></p>
                            </div>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
        <?php require_once "right_sidebar.php"; ?>
    </div>
</div>

<?php include_once "frontPanel/footer.php"; ?>