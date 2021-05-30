<?php

session_start();
if ($_SESSION['name']){
    echo "hello".$_SESSION['name'];
    echo "<a href='clear.php'>Logout</a>";
}else{
    header("location:index.php");
}