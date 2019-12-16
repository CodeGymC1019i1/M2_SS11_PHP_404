<?php
function findMin($arr){
    $min = $arr[0];
    for ($i=1; $i<=count($arr);$i++){
        if ($arr[$min]<$min)
            $min = $arr[$i];
    }
    return $min;
}