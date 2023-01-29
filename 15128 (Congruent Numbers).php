<?php

fscanf(STDIN, "%d %d %d %d", $p1, $q1, $p2, $q2);

$triangle = ($p1 / $q1) * ($p2 / $q2) * 0.5;

// 부동소수점 때문에 엡실론을 사용한다 (컴퓨터 시스템 계산에서 가장 작은 차이라고 함)

$val1 = $triangle;
$val2 = round($triangle);
$epsilon = 0.000001;

if(abs($val1 - $val2) < $epsilon){
    $result = 1;
}else{
    $result = 0;
}

echo $result;