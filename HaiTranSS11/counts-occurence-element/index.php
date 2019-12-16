<?php

include_once "counts-occurence-element.php";
include_once "../initArrayNumbers/initArrayNumbers.php";

$numbers = initArrayNumbers(100, 1, 100);

$number1 = 1;
$number2 = 99;

echo "So lan xuat hien cua phan tu ".$number1." la: ".countOccurencesElement($numbers,$number1)."<br>";
echo "So lan xuat hien cua phan tu ".$number2." la: ".countOccurencesElement($numbers,$number2);

