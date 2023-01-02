<?php

// 풀이는 하단 링크 참고함
// https://jae04099.tistory.com/entry/%EB%B0%B1%EC%A4%80-7576-%ED%86%A0%EB%A7%88%ED%86%A0-%ED%8C%8C%EC%9D%B4%EC%8D%AC-%ED%95%B4%EC%84%A4%ED%8F%AC%ED%95%A8

// 기본 array 자료구조로는 한계가 있음. Spl을 이용해보도록 하겠음 (Standard PHP Library)

fscanf(STDIN, "%d %d", $m, $n);

// 최단거리 구하는 문제.
// 최단거리는 bfs 즉, queue를 이용한다.
// 모르겠으면 그림을 그려본다 (트리 모양으로)

$tomato = new SplQueue(); // 익은 토마토 좌표 (큐로 사용할 것임)

// x, y축 변화량으로 방향 지정 (총 4방향)
$dx = array(-1, 1, 0, 0);
$dy = array(0, 0, -1, 1);

$box = array(); // 현재 박스 상태

// 현재 박스 상태를 기입
for ($i=0; $i < $n; $i++) {
    $box[$i] = explode(" ", trim(fgets(STDIN)));

    for ($j=0; $j < $m; $j++) { 
        if($box[$i][$j] == 1){
            // 익어있는 토마토들의 최상단 가지(좌표)들을 큐에 넣자
            $tomato->unshift($j); // array로 넣을 시 메모리 초과하므로 따로따로 넣고 따로따로 뺌
            $tomato->unshift($i);
        }
    }
}

function more_less($a, $b, $c){ // 삼중 비교하는 함수
    if($a <= $b && $b <= $c){
        return true;
    }else{
        return false;
    }
}

$max = 0;

// queue에서 더 이상 익힐 토마토가 없을 때까지 (새로 익힌 토마토를 큐에 넣으면서 진행)
while(!($tomato->isEmpty())){
    // 맨 상단 트리부터 시작
    $x = $tomato->pop(); // 큐에서 뺌
    $y = $tomato->pop();

    for ($i=0; $i < 4; $i++) {
        $new_x = $x + $dx[$i];
        $new_y = $y + $dy[$i];

        // 해당 box 상태에서 new_x, new_y의 좌표가 0인 상태여야 하고, 범위를 벗어나면 안 됨
        if(more_less(0, $new_x, $m - 1) && more_less(0, $new_y, $n - 1) && $box[$new_y][$new_x] == 0){

            // 새 토마토를 익히면서, 해당 위치를 현재 익힌 숫자의 +1을 함으로써 시작으로부터 몇 칸인지 적는다
            $box[$new_y][$new_x] = $box[$y][$x] + 1;
            
            if($box[$new_y][$new_x] > $max){
                $max = $box[$new_y][$new_x];
            }

            $tomato->unshift($new_x);
            $tomato->unshift($new_y);
        }
    }

}

$result = "";

// 만약 0이 아직도 있으면 다 익히지 못함
for ($i=0; $i < $n; $i++) { 
    if(in_array(0, $box[$i])){
        $result = -1;
        break;
    }
}

if($result != '-1'){ // 안 익은 토마토가 있는 경우
	$result = ($max == 0) ? 0 : $max - 1;
}

echo $result;