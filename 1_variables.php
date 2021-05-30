<?php

$name = "aung min oo";
$age = 22;
$arr = ["a","b","c"];

//associated array
$assoArray = [
  "first name" => "Aung",
  "last name" => "Min Oo"
];

echo "My name is $name and $age years old";
//</br>;
echo "this is $arr[1]";
echo "first name is {$assoArray['first name']}";
function run(){
    return $GLOBALS['name'];
}
echo run();