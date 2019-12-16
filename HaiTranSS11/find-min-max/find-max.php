<?php

function findMax($numbers) {
    $max = $numbers[0];

    for ($i=1; $i < count($numbers); $i++)
        if ($numbers[$i] > $max) {
            $max = $numbers[$i];
        }

    return $max;
}
