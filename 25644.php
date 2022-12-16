<?php

/**
 * DP 문제
 * 
 * 최대 이득 구하는 문제
 * 
 * 20만 개에 제한시간 1초
 * 
 */


fscanf(STDIN, "%d", $n);

$now_num = 0;

$array = explode(" ", trim(fgets(STDIN)));

$max_profit = 0; // 최대 이윤

for ($i = 0; $i < $n; $i++) {
    if($i == 0){
        $now_num = $array[$i];
    }else{
        if($now_num > $array[$i]){ // 현재 숫자가 전 숫자보다 작을 경우
            $now_num = $array[$i];
        }else{ // 현재 숫자가 전 숫자보다 클 경우
            $profit = $array[$i] - $now_num;
            // $now_num은 그대로 둔다

            if($profit > $max_profit){
                $max_profit = $profit;
            }
        }
    }
}

echo $max_profit;