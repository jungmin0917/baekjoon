<?php

function bigmul($a, $b){

    $a_arr = str_split($a);
    $b_arr = str_split($b);

    // 둘 중 하나가 음수면 결과 음수

    $minus = false; // 음수 여부

    if(($a_arr[0] == "-" && $b_arr[0] != "-") || ($a_arr[0] != "-" && $b_arr[0] == "-")){
        $minus = true;
    }
    
    if($a_arr[0] == "-"){
        array_shift($a_arr);
    }
    
    if($b_arr[0] == "-"){
        array_shift($b_arr);
    }

    $a_c = count($a_arr);
    $b_c = count($b_arr);

    // x자리수와 y자리수 곱하면 최대 x+y 자리수이므로 미리 채워놓는다

    $ans = array_fill(0, $a_c + $b_c - 1, 0);

    for ($i=0; $i < $a_c; $i++) { 
        for ($j=0; $j < $b_c; $j++) {
            $ans[$i + $j] += $a_arr[$i] * $b_arr[$j];
        }
    }

    $ans_c = count($ans);

    $next = 0;

    for ($i=$ans_c - 1; $i > 0; $i--) {
        $next = intdiv($ans[$i], 10);
        $ans[$i] %= 10;

        $ans[$i - 1] += $next;
    }

    $answer = implode($ans);

    if($minus){
        $answer = "-" . $answer;
    }

    return $answer;
}