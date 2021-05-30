<div class="col-12 col-md-4">
    <div class="front-panel-right-sidebar">
        <div class="card">
            <div class="card-body">
                <?php if ($_SESSION['user']['id']) { ?>
                    <p>Welcome <b><?php echo $_SESSION['user']['name']; ?></b></p>
                    <a href="<?php echo $url; ?>/dashboard.php" class="btn btn-primary">Go to dashboard</a>
                <?php } else { ?>

                    <p><b class="text-uppercase">Subscribe for more </b></p>
                    <a href="<?php echo $url; ?>/register.php" class="btn btn-primary">Subscribe</a>
                <?php } ?>

            </div>
        </div>
        <h4 class="p-2 text-center">Categories</h4>
        <div class="">
            <a href="<?php echo $url; ?>/index.php" class="list-group-item list-group-item-action <?php echo isset($_GET['category_id']) ? '' : 'active' ?>">
                All Categories
            </a>
        </div>
        <div class="list-group mb-4 ">
            <?php foreach (fCategories() as $c) { ?>
                <a href="category_based_posts.php?category_id=<?php echo $c['id']; ?>" class="list-group-item list-group-item-action right-category-list <?php echo isset($_GET['category_id']) ? ($_GET['category_id'] == $c['id'] ? 'active' : '') : '' ?>">
                    <?php echo $c['title']; ?>
                    <?php if ($c['ordering'] == '1') { ?>
                        <i class="feather-paperclip text-primary"></i>
                    <?php } ?>
                </a>
            <?php } ?>
        </div>
        <div class="">
            <h4>Search By Date</h4>
            <div class="card">
                <div class="card-body">
                    <form action="search_by_date.php" method="post">
                        <div class="form-gorup">
                            <label for="">Start Date</label>
                            <input type="date" name="start" class="form-control" required>
                        </div>
                        <div class="form-gorup mt-3">
                            <label for="">End Date</label>
                            <input type="date" name="end" class="form-control" required>
                        </div>
                        <button class=" btn btn-primary mt-3"><i class="calendar">Search</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>