<?php include "core/auth.php"; ?>
<?php include "core/isAdmin.php" ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">User List</li>
                <!-- <li class="breadcrumb-item"><a href="<?php echo $url; ?>/post_add.php">User</a></li> -->

            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="mb-0">
                        <i class="feather-users text-primary"></i>
                        Users List
                    </h4>
                    <a href="#" class="btn btn-outline-secondary full-screen-btn maximize-btn">
                            <i class="feather-maximize-2"></i>
                        </a>
                </div>
                
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (users() as $c) {


                        ?>
                            <tr>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo $c['name']; ?></td>
                                <td><?php echo $c['email']; ?></td>
                                <td><?php echo $role[$c['role']]; ?></td> 
                                <td><?php echo $c['control']; ?></td> 
                                <td><?php echo showTime($c['created_at']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $(".table").dataTable({
        "order" : [[0, "desc"]]
    });
</script>