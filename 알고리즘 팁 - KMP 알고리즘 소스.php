<?php

// KMP 알고리즘 구현
// 문자열 매칭 알고리즘

// 매칭 문자열의 접두사와 접미사의 공통 부분 (경계)를 사용하여 다음 매칭을 최적화함

function kmp($text, $pattern){
    $n = strlen($text);
    $m = strlen($pattern);

    $table = get_match_table($pattern);

    $j = 0;
    for ($i=0; $i < $n; $i++) { 
        while ($j > 0 && $text[$i] != $pattern[$j]) {
            $j = $table[$j - 1];
        }

        if($text[$i] == $pattern[$j]){
            $j++;
        }

        if($j == $m){
            return 1;
        }
    }

    return 0;
}

function get_match_table($pattern){
    $m = strlen($pattern);
    $table = array_fill(0, $m, 0);

    $j = 0;

    for ($i=1; $i < $m; $i++) { 
        while($j > 0 && $pattern[$i] != $pattern[$j]){
            $j = $table[$j - 1];
        }

        if($pattern[$i] == $pattern[$j]){
            $j++;
        }

        $table[$i] = $j;
    }

    return $table;
}



