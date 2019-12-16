<?php

function findMin($numbers) {
    $min = $numbers[0];

    for ($i=1; $i < count($numbers); $i++)
        if ($numbers[$i] < $min) {
            $min = $numbers[$i];
        }

    return $min;
}