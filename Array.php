<?php

$fruit = array("apple","orange","mango","pineapple");

$mySelf = array(
    "name" => "Aung Min Oo",
    "age" => 22,
    "gender" => "Male",
    "job" => array("Web developer","Programmer","MD"),
);

$range = range(1,99);
echo "<pre>";
//print_r($range);
echo in_array("mango",$fruit);
echo array_key_exists("name",$mySelf)?"shi tal":"ma shi bu";
echo in_array("Aung Min Oo",$mySelf)?"shi tal":"ma shi bu";