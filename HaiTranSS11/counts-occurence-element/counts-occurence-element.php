<?php


function countOccurencesElement($numbers, $elementFind) {

    $count = 0;

    foreach ($numbers as $value)
        if ($value === $elementFind)
            $count++;

        return $count;
}