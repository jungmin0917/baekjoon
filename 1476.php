<?php

/**
 * E = 15
 * S = 28
 * M = 19
 * 
 * E S M으로 표시되는 가장 빠른 연도를 구한다
 * 
 * 약간 최소공배수 그런 거 같음
 */

$e = 15;
$s = 28;
$m = 19;

// 걍 브루트 포스로 풀자...

fscanf(STDIN, "%d %d %d", $a, $b, $c);

$i = 1;

while(true){ // break 나올 때까지 반복

    // 각 나눠서 나머지가 a, b, c여야 함

    $a_div = $i % $e;
    if($a_div == 0){
        $a_div = $e;
    }

    $b_div = $i % $s;
    if($b_div == 0){
        $b_div = $s;
    }

    $c_div = $i % $m;
    if($c_div == 0){
        $c_div = $m;
    }

    if($a_div == $a && $b_div == $b && $c_div == $c){
        echo $i;
        break;
    }

    $i++; // 아니면 증가

}


// 여담 : while문 안에 $i 초기화해서 뻘짓 30분 함

// 여담 : 치환 안 해줘서 엄청 헤맴 (1시간 넘게)