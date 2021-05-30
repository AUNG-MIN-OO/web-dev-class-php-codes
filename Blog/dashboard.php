<?php require_once "core/auth.php" ?>
<?php include "template/header.php"; ?>

<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('https://google.com')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-shopping-bag h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">123</span>
                        </p>
                        <p class="mb-0 text-black-50">Today Order</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('https://google.com')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-users h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">456</span>
                        </p>
                        <p class="mb-0 text-black-50">Total User</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('item_list.html')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-package h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">223</span>
                        </p>
                        <p class="mb-0 text-black-50">Total Items</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-3">
        <div class="card mb-4 status-card" onclick="go('https://google.com')">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-3">
                        <i class="feather-map-pin h1 text-primary"></i>
                    </div>
                    <div class="col-9">
                        <p class="mb-1 h4 font-weight-bolder">
                            <span class="counter-up">14</span>
                        </p>
                        <p class="mb-0 text-black-50">Support Location</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-12 col-xl-7">
        <div class="card overflow-hidden shadow mb-4">
            <div class="">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Visitors</h4>
                    <div class="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar1.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar2.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar3.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar4.jpg" class="ov-img rounded-circle" alt="">
                        <img src="<?php echo $url; ?>/assets/img/user/avatar5.jpg" class="ov-img rounded-circle" alt="">
                    </div>
                </div>

                <canvas id="ov" height="137"></canvas>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 col-xl-5">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center p-3">
                    <h4 class="mb-0">Category / Posts</h4>
                    <div class="">
                        <i class="feather-pie-chart h4 mb-0 text-primary"></i>
                    </div>
                </div>
                <canvas id="op" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card overflow-hidden mb-4">

            <div class="">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <h4 class="mb-0">Recent Posts</h4>
                    <div class="" style="width: 400px;">
                        <?php
                        $currentUser = user($_SESSION['user']['id'])['name'];
                        $currentUserId = $_SESSION['user']['id'];
                        $postTotal = countTotal("posts");
                        $currentUserPosts = countTotal("posts", "user_id = $currentUserId");
                        $currentUserPostByPercentage = ($currentUserPosts / $postTotal) * 100;


                        ?>
                        <p class="mb-0">Posts By <b><?php echo strtoupper($currentUser); ?></b> Percantage Bar (<?php echo number_format($currentUserPostByPercentage, 2) . "%"; ?>)</p>
                        

                        <div class="progress" style="height: 5px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: <?php echo number_format($currentUserPostByPercentage, 2) . "%"; ?>" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <?php if ($_SESSION['user']['role'] == 0) { ?>
                                <th>User</th>
                            <?php } ?>
                            <th>Viewers</th>
                            <th>Control</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (dashboardPosts(5) as $c) {
                        ?>
                            <tr>
                                <td><?php echo $c['id']; ?></td>
                                <td><?php echo short($c['title']); ?></td>
                                <td><?php echo short(strip_tags(html_entity_decode($c['description']))); ?></td>
                                <td><?php print_r(category($c['category_id'])['title']); ?></td>
                                <?php if ($_SESSION['user']['role'] == 0) { ?>
                                    <td class="text-nowrap"><?php print_r(user($c['user_id'])['name']); ?></td>
                                <?php } ?>
                                <td><?php echo count(viewerCountByPost($c['id'])); ?></td>
                                <td class="text-nowrap">
                                    <a href="post_detail.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-info btn-sm">
                                        <i class="feather-info fa-fw"></i>
                                    </a>
                                    <a href="post_delete.php?id=<?php echo $c['id']; ?>" onclick="return confirm('Are you sure to want to delete?')" class="btn btn-outline-danger btn-sm">
                                        <i class="feather-trash-2 fa-fw"></i>
                                    </a>
                                    <a href="post_edit.php?id=<?php echo $c['id']; ?>" class="btn btn-outline-warning btn-sm">
                                        <i class="feather-edit-2 fa-fw"></i>
                                    </a>

                                </td>
                                <td class="text-nowrap"><?php echo showTime($c['created_at']); ?></td>
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
    $('.counter-up').counterUp({
        delay: 10,
        time: 1000
    });

    <?php
    $dateArr = [];
    $visitorRate = [];

    $today = date("Y-m-d");

    for ($i = 0; $i < 10; $i++) {
        $date = date_create($today);
        date_sub($date, date_interval_create_from_date_string("$i days"));
        $current = date_format($date, "Y-m-d");
        array_push($dateArr, $current);
        $result = countTotal('viewers', "CAST(created_at AS DATE)= '$current'");
        array_push($visitorRate, $result);
    }




    ?>

    let dateArr = <?php echo json_encode($dateArr); ?>;
    let viewerCountArr = <?php echo json_encode($visitorRate); ?>;

    var ov = document.getElementById('ov').getContext('2d');
    var ovChart = new Chart(ov, {
        type: 'line',
        data: {
            labels: dateArr,
            datasets: [{
                    label: 'Visitor Count',
                    data: viewerCountArr,
                    backgroundColor: [
                        '#007bff30',
                    ],
                    borderColor: [
                        '#007bff',
                    ],
                    borderWidth: 1,
                    tension: 0
                },

            ]
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    display: false,
                    gridLines: [{
                        display: false
                    }]

                }]
            },
            legend: {
                display: true,
                position: 'top',
                labels: {
                    fontColor: '#000000',
                    usePointStyle: true
                }
            }
        }
    });

    <?php
    $catName = [];
    $countPostsByCategory = [];
    foreach (categories() as $c) {
        array_push($catName, $c['title']);
        //SELECT COUNT(id) FROM posts WHERE category_id=$c['id]
        array_push($countPostsByCategory, countTotal('posts', "category_id={$c['id']}"));
    }
    //php array to js array

    ?>


    let catArr = <?php echo json_encode($catName); ?>;
    let countArr = <?php echo json_encode($countPostsByCategory); ?>

    var op = document.getElementById('op').getContext('2d');
    var opChart = new Chart(op, {
        type: 'doughnut',
        data: {
            labels: catArr,
            datasets: [{
                label: '# of Votes',
                data: countArr,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(82, 215, 38, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(82, 215, 38, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    display: false,
                    ticks: {
                        beginAtZero: true
                    }
                }],
                xAxes: [{
                    display: false,
                }]
            },
            legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#000000',
                    usePointStyle: true
                }
            }
        }
    });
</script>