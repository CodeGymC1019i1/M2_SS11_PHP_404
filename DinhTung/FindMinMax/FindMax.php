<?php
function findMax($arr){
    $max = $arr[0];
    for ($i=1; $i<=count($arr); $i++){
        if($arr[$i]>$max)
            $max = $arr[$i];
    }
    return $max;
}