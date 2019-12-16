<?php

include_once "find-max.php";
include_once "find-min.php";
include_once "../initArrayNumbers/initArrayNumbers.php";

$numbers = initArrayNumbers(100, 1, 10000);

echo "<br>Max: ".findMax($numbers);
echo "<br>Min: ".findMin($numbers);

