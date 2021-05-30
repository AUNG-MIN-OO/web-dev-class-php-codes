<?php

$conn = mysqli_connect("localhost","root","","our_list");

if(!$conn) {
    die("connection fail : " . mysqli_connect_error());
}
