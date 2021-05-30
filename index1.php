<?php
$con = mysqli_connect("localhost","root","");
if ($con){
    echo "connection success";
}else{
    die("connection fail : ".mysqli_connect_error());
}