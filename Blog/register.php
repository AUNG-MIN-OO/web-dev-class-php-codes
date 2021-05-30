<?php
    require_once "core/base.php";
    require_once "core/functions.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/feather-icons-web/feather.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/vendor/data_table/jquery.dataTables.min.css">
</head>
<body style="background: var(--primary-soft)">
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center text-primary">
                        <i class="feather-user "></i>
                        User Register
                    </h4>
                    <hr>
                    <?php

                    if (isset($_POST['reg-btn'])){
                        echo register();
                    }

                    ?>
                    <form method="post" >
                        <div class="form-group">
                            <label for="name">
                                <i class="text-primary feather-user"></i>
                                Your Name
                            </label>
                            <input type="text" name="name" class="form-control name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">
                                <i class="text-primary feather-mail"></i>
                                Email Address
                            </label>
                            <input type="email" name="email" class="email form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">
                                <i class="text-primary feather-lock"></i>
                                Password
                            </label>
                            <input type="password" name="password" class="form-control" min="8" required>
                        </div>
                        <div class="form-group">
                            <label for="cPassword">
                                <i class="text-primary feather-lock"></i>
                                Confirm Password
                            </label>
                            <input type="password" name="cPassword" class="form-control" min="8" required>
                        </div>
                        <div class="form-group mb-0 d-flex justify-content-end">
                            <a href="login.php" class="btn btn-link mr-2">Sign In</a>
                            <button class="btn btn-primary " name="reg-btn">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo $url; ?>/assets/vendor/jquery.min.js"></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="<?php echo $url; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $url; ?>/assets/js/app.js"></script>

</body>
</html>

