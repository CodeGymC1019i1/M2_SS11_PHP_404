<?php

include_once "NetworkOperator.php";

$viettel = new NetworkOperator("Viettel");
$vinaphone = new NetworkOperator("Vinaphone");
$mobifone = new NetworkOperator("Mobifone");
$vietnammobile = new NetworkOperator("Vietnammobile");



$viettel->addHeadNumber("086");
$viettel->addHeadNumber("096");
$viettel->addHeadNumber("097");
$viettel->addHeadNumber("098");
$viettel->addHeadNumber("032");
$viettel->addHeadNumber("033");
$viettel->addHeadNumber("034");
$viettel->addHeadNumber("035");
$viettel->addHeadNumber("036");
$viettel->addHeadNumber("037");
$viettel->addHeadNumber("038");
$viettel->addHeadNumber("039");

$vinaphone->addHeadNumber("089");
$vinaphone->addHeadNumber("090");
$vinaphone->addHeadNumber("093");
$vinaphone->addHeadNumber("070");
$vinaphone->addHeadNumber("076");
$vinaphone->addHeadNumber("077");
$vinaphone->addHeadNumber("078");
$vinaphone->addHeadNumber("079");

$mobifone->addHeadNumber("081");
$mobifone->addHeadNumber("083");
$mobifone->addHeadNumber("084");
$mobifone->addHeadNumber("085");
$mobifone->addHeadNumber("091");
$mobifone->addHeadNumber("094");
$mobifone->addHeadNumber("088");

$vietnammobile->addHeadNumber("092");
$vietnammobile->addHeadNumber("056");
$vietnammobile->addHeadNumber("058");

$networkOperators = [$viettel, $vinaphone, $mobifone, $vietnammobile];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumbers = explode(",",$_POST["numberphones"]);
    foreach ($phoneNumbers as $phoneNumber) {
        $finded = false;
        for ($i = 0; $i < count($networkOperators); $i++) {
            for ($j=0; $j < count($networkOperators[$i]->listHeadNumber);$j++) {
                if (strpos($phoneNumber, $networkOperators[$i]->listHeadNumber[$j]) === 0) {
                    $networkOperators[$i]->addNumbers($phoneNumber);
                    $finded = true;
                    break;
                }
            }
            if ($finded)
                break;
        }
    }

    foreach ($networkOperators as $networkOperator) {
        echo $networkOperator->name.' ';
        var_dump($networkOperator->numbers);
        echo "<br>";
    }
}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <form action="" method="post">
        <textarea name="numberphones" id="" cols="30" rows="10"
                  placeholder="Type phone numbers separated by ',' symbol."></textarea><br>
        <input type="submit" value="Classify">
    </form>
</div>
</body>
</html>

