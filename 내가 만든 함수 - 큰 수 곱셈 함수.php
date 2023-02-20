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

    if($answer == 0){
        $answer = 0;
    }

    if($minus){
        $answer = "-" . $answer;
    }

    return $answer;
}

function bigdiv($a, $b){
    
    $a = str_split($a);
    $b = str_split($b);

    $len = count($b);

    if(count($a) < count($b)){
        return "0\n" . implode($a);
    }
    
    $diff = count($a) - count($b); // 현재 피제수 빼는 자리 수 (피제수의 길이 - 제수의 길이)

    $now_count = array(); // 현재 수 count array

    for ($j=0; $j <= $diff; $j++) { 
        $count = 0; // 현재 자리에서 성공적으로 뺀 수

        while(true){ // 현재 위치에서 피제수가 제수보다 클 동안 반복

            // 제대로 계산하기 전에 일단 temp로 계산할 것
            $temp = $a;

            for ($k = $len - 1; $k >= 0; $k--) {

                if ($temp[$k + $j] - $b[$k] < 0) {
                    if (isset($temp[$k + $j - 1])) { // 그 앞자리가 있는 경우라면
                        $temp[$k + $j] = $temp[$k + $j] + 10 - $b[$k];
                        $temp[$k + $j - 1]--;
                    } else { // 그 앞자리가 없는 경우라면
                        // 원상복구 해야 함
                        $temp = $a; // 원상복구
                        break 2;
                    }
                } else {
                    $temp[$k + $j] -= $b[$k];
                }
            }

            // 피제수의 맨 앞자리가 -이면 원상복구 하고 다음 줄로 넘어가기
            if(isset($temp[$j - 1]) && $temp[$j - 1] < 0){
                $temp = $a; // 원상복구
                break;
            }else{
                // 여기까지, 정상적으로 뺐을 경우에만 a에 적용한다
                $a = $temp;

                // 정상적으로 다 뺐으면
                $count++;
            }
        }

        $now_count[] = $count;
    }

    // 몫도 앞의 0 지우기
    while(isset($now_count[0]) && $now_count[0] == 0){
        array_shift($now_count);
    }

    if(!isset($now_count[0])){
        $now_count = 0;
    }else{
        $now_count = implode($now_count);
    }

    // 앞의 0 지우기
    while(isset($a[0]) && $a[0] == 0){
        array_shift($a);
    }

    if(!isset($a[0])){
        $a = 0;
    }else{
        $a = implode($a);
    }

    return "{$now_count}\n{$a}";
}