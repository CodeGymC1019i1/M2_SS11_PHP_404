<?php

function initArrayNumbers($size, $start, $end) {
    $numbers = [];

    for ($i=0; $i < $size; $i++) {
        $numbers[$i] = mt_rand($start, $end);
        echo $numbers[$i]." ";
        if ($i % 10 == 0 && $i > 9)
            echo "<br>";
    }

    return $numbers;
}

