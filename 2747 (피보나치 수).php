<?php

fscanf(STDIN, "%d", $n);

$array = array(0, 1); // 여기에 피보나치 수 저장

function recursive($n){
    global $array;

    if(!isset($array[$n])){
        $array[$n] = recursive($n - 1) + recursive($n - 2); // array에 저장
    } 

    return $array[$n];
}

$result = recursive($n);

echo $result;