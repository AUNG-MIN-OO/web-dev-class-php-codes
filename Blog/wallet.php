<?php require_once "core/auth.php"?>
<?php include "template/header.php"; ?>

<?php
    if (isset($_POST['payOn'])){
        if(payOn()){
            linkTo("wallet.php");
        }
    }
?>

<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb bg-white mb-4">
                <li class="breadcrumb-item"><a href="<?php echo $url; ?>/dashboard.php">Home</a></li>
<!--                <li class="breadcrumb-item"><a href="--><?php //echo $url; ?><!--/category_list.php">Category List</a></li>-->
                <li class="breadcrumb-item active" aria-current="page">Wallet</li>
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
                        <i class="feather-dollar-sign text-primary"></i>
                        Wallet
                    </h4>
                    <div class="">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="feather-user"></i>
                            Your Money : $<?php echo user($_SESSION['user']['id'])['money']; ?>
                        </a>
                        <a href="#" class="btn btn-outline-secondary full-screen-btn maximize-btn">
                                <i class="feather-maximize-2"></i>
                        </a>
                    </div>
                </div>
                <hr>
                
                <form method="post">

                    <div class="form-inline mb-3">
                        <select name="to_user" id="" class="custom-select mr-2 w-25">
                            <option value="0" selected disabled>Select Reciepient</option>
                            <?php foreach(users() as $user){ ?>
                                <?php if($user['id'] != $_SESSION['user']['id']){ ?>
                                    <option name="" value="<?php echo $user['id']; ?>" id=""><?php echo $user['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                        <input type="number" class="form-control mr-3 w-25" name="amount" min="100" max="<?php echo user($_SESSION['user']['id'])['money']; ?>" placeholder="pay amount" required>
                        <input type="text" class="form-control mr-3" name="description" placeholder="description" required>
                        <button class="btn btn-primary" name="payOn">
                            Pay On
                        </button>
                    </div>

                </form>

                <hr>

                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Amount</th>
                        <th>Description</th>
                        <th>Date/Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach(transactions() as $t){  ?>
                        <tr>
                            <td><?php echo $t['id']; ?></td>
                            <td><?php echo user($t['from_user'])['name'];  ?></td>
                            <td><?php echo user($t['to_user'])['name'];  ?></td>
                            <td><?php echo $t['amount']; ?></td>
                            <td><?php echo $t['description']; ?></td>
                            <td><?php echo date("d-m-Y / h:i",strtotime($t['created_at'])) ?></td>
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

