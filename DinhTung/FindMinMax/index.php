<?php
include_once "FindMax.php";
include_once "FindMin.php";
$numbers=range(1,100,1);
echo "so lon nhat trong mang la: ".findMax($numbers);
echo "</br>";
echo "so nho nhat trong mang la: ".findMin($numbers);