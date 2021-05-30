<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="write.php" method="post">
        <label for="">User Name</label>
        <input type="text" name="username">
        <br>
        <label for="">Password</label>
        <input type="password" name="password">
        <br>
        <button>Submit</button>
    </form>
    <ul>
        <?php 
        $list = scandir("store");
        
        foreach ($list as $key => $l){

            if($l == "." || $l == ".."){
                continue;
            }
            ?>
            <li>
                <a href="delete.php?name=<?php echo$l ?>">Delete</a> | <a href="store/<?php echo$l ?>"><?php echo$l ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
    
</body>
</html>