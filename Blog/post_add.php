<?php include "core/auth.php" ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_list.php">Post List</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Post</li>
            </ol>
        </nav>
    </div>
</div>
<?php

if (isset($_POST['addPost'])) {
    postAdd();
}

?>
<form class="row" method="post">
    <div class="col-12 col-xl-8">
        <div class="card mb-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-plus-circle text-primary"></i>
                        Create New Post
                    </h4>
                    <a href="<?php echo $url; ?>/post_list.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>

                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="title">Post Description</label>
                    <textarea type="text" name="description" id="description" rows="15" class="form-control" required></textarea>
                    <!-- <div id="summernote"></div> -->
                </div>

            </div>
        </div>
    </div>
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="feather-layers text-primary"></i>
                        Select Category
                    </h4>
                    <a href="<?php echo $url; ?>/category_add.php" class="btn btn-outline-primary">
                        <i class="feather-list"></i>
                    </a>
                </div>
                <hr>
                <div class="form-group">
                    <?php foreach (categories() as $c) { ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="category_id" value="<?php echo $c['id']; ?>" id="category_id<?php echo $c['id']; ?>">
                            <label class="form-check-label" for="category_id<?php echo $c['id']; ?>">
                                <?php echo $c['title']; ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
                <button class="btn btn-primary" name="addPost">
                    Add Post
                </button>
            </div>
        </div>
    </div>
</form>

<?php include "template/footer.php"; ?>

<script>
    //   using js
    // $(document).ready(function() {
    //     $('#summernote').summernote();
    // });
    //using boostrap
    $("#description").summernote({
        placeholder: 'Add Description',
        tabsize: 2,
        height: 230,
    });
</script>