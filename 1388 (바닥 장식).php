<?php

/***
 * 일단 그래프 문제를 풀기에 앞서 그래프가 뭔지 이해할 필요가 있다
 * 그래프는 정점(Vertex)과 정점을 연결하는 변(Edge)로 구성되어 있다
 * 정점은 원으로 표현하고 변은 화살표로 보통 표현한다
 * 한붓그리기 문제, 다리건너기 문제 등에 그래프 이론이 사용된다
 * 
 * 문제 보니, 가로로 받아서 먼저 세고, 세로는 전부 다 받아서 따로 계산하면 될 것 같다.
 */

fscanf(STDIN, "%d %d", $a, $b);

// 먼저 가로로 받는다

// $row_array = 가로에 쓸 array
// $column_array = 세로에 쓸 array

// 전체 필요한 나무판자 갯수 = $result

$result = 0;

$array = array(); // 임시 저장할 배열

// 먼저 가로('-')부터
for ($i = 0; $i < $a; $i++) {
    $array[] = fgets(STDIN);

    $row_array = str_split($array[$i]);

    $now_row = false;

    for ($j = 0; $j < $b; $j++) {

        // 만약 '-'이면 계산에 쓰고, '|'이면, 일단 넘긴다

        if($row_array[$j] == '-'){
            if($now_row){
                // 넘김
            }else{ // 처음 나왔거나 이전에 '|'였던 경우
                if($j == 0 || $row_array[$j-1] == '|'){
                    $result++; // 1개 추가
                }else{ // 바로 이전에도 나온 경우

                }

                $now_row = true;
            }
        }else{ // '|'가 나온 경우
            $now_row = false;
        }
    }
}

$column_array = array();

// 세로('|') 계산
// 세로 계산은 위에 받아놓은 $array를 이용해 하자.
// $array를 이용해 세로로 계산할 것임
for ($i = 0; $i < $a; $i++) {

    $new_array = str_split($array[$i]);

    for ($j = 0; $j < $b; $j++) {
        // ex) 0, 2 => 2, 0으로 
        $column_array[$j][$i] = $new_array[$j];
    }
}

for ($i = 0; $i < $b; $i++) {

    $now_column = false;

    for ($j = 0; $j < $a; $j++) {
        
        // 만약 '|'이면 계산에 쓰고, '-'이면, 일단 넘긴다

        if($column_array[$i][$j] == '|'){

            if($now_column){
                // 넘김
            }else{ // 처음 나왔거나 이전에 '|'였던 경우
                if($j == 0 || $column_array[$i][$j-1] == '-'){
                    $result++; // 1개 추가
                }else{ // 바로 이전에도 나온 경우

                }

                $now_column = true;
            }
        }else{ // '-'가 나온 경우
            $now_column = false;
        }
    }

}


echo $result;