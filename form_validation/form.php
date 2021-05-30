<?php
require_once "base.php";
require_once "function.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validation</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-dark">

<div class="container">
    <div class="row justify-content-center align-items-center w-100 min-vh-100">
        <div class="col-12 col-md-4">
            <div class="">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-weight-bold text-uppercase text-center">
                            Register</h4>
                        <hr>
                        <?php
                        if (isset($_POST['reg'])) {
                            register();
                        }
                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">User Name</label>
                                <input type="text" name="name" id="name"
                                       class="form-control"
                                       value="<?php echo old('name'); ?>">
                                <?php if (getError('name')) { ?>
                                    <small class="text-danger font-weight-bold"><?php echo getError('name'); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="text" name="email" id="email"
                                       class="form-control"
                                       value="<?php echo old('email'); ?>">
                                <?php if (getError('email')) { ?>
                                    <small class="text-danger font-weight-bold"><?php echo getError('email'); ?></small>
                                <?php } ?>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="text" name="phone" id="phone"
                                       class="form-control"
                                       value="<?php echo old('phone'); ?>">
                                <?php if (getError('phone')) { ?>
                                    <small class="text-danger font-weight-bold"><?php echo getError('phone'); ?></small>
                                <?php } ?>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox"
                                           class="custom-control-input"
                                           id="customSwitch2">
                                    <label class="custom-control-label"
                                           for="customSwitch2">Agree All</label>
                                </div>
                                <button type="submit" class="btn btn-primary"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Tooltip on top" name="reg">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--        <div class="col-12 col-md-8">-->
        <!--            <div class="card">-->
        <!--                <div class="card-body">-->
        <!---->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
</div>

</body>
</html>