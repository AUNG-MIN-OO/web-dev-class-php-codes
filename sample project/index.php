<?php include "template/header.php"; ?>

<h1> This is index page</h1>

<pre>
    <?php
    echo "http://{{$_SERVER['HTTP_HOST']}}/php_learning/sample%20project/";
    print_r($_SERVER);
    ?>
</pre>


<?php include "template/footer.php"; ?>
