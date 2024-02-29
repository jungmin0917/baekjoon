<?php

fscanf(STDIN, "%d", $n);
fscanf(STDIN, "%d", $m);

$arr = explode(" ", trim(fgets(STDIN)));

rsort($arr);

$rank = 1;

foreach($arr as $v){
    if($v > $m){
        $rank++;
    }else{
        $result = $rank;
        break;
    }
}

$result = $rank;

echo $result;