<?php
function theNumberOfOccurrene($numbers,$value){
    $count = 0;
    for ($i=0;$i<count($numbers);$i++){
        if ($numbers[$i]===$value) {
            $count++;

        }
    }
    return $count;
}
$numbers = [1,2,3,4,5,6,7,7,8,9,0,7,7,7,7,7,7,7,7];
echo theNumberOfOccurrene($numbers,7);

