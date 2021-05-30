<?php

function con (){
    return mysqli_connect("localhost","root","","Blog");
}

$info = array(
  "name" => "Blog",
  "short" => "MB",
  "description" => "First full stack blog of me",
);

$role = ["Admin","Editor","User"];



$url = "http://{$_SERVER['HTTP_HOST']}/php_learning/Blog";

date_default_timezone_set('Asia/Tokyo');
