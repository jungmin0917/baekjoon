<?php

/**
 * 
 * 2178 미로 탐색
 * 
 * 처음으로 인접행렬로 된 문제를 푼다
 * 
 * https://iancoding.tistory.com/329 // 이 링크를 참조하여 내 생각대로 재구성했음
 * https://wooono.tistory.com/410 // 이쪽 그림도 참고해서 이해하면 좋다
 * 
 * 특정한 지점의 주변 상, 하, 좌, 우를 살펴본 뒤에 주변 지점 중 값이 1이면서 아직 방문하지 않은 지점이 있다면 해당 지점을 방문한다.
 * 
 * SplDoublyLinkedList Class를 이용해서 풀어보자
 * 
 */


// BFS를 이용하면 최단거리를 알아낼 수 있다. (큐 이용)

fscanf(STDIN, "%d %d", $n, $m);

// 총 n * m개의 노드가 있다고 보면 됨

for ($i=0; $i < $n; $i++) {
    $array[] = str_split(trim(fgets(STDIN)));
}

$x = 0;
$y = 0;

// 4방향 탐색이므로 아래와 같이 미리 array를 만들어 놓고, dx, dy로 변화값을 주면서 탐색한다
// 만약 해당 방향으로 가서 정상적으로 길에 도달하면 길을 push한다.
$direction_x = array(-1, 1, 0, 0);
$direction_y = array(0, 0, -1, 1);
// 각각 좌, 우, 하, 상을 의미 (-1, 0), (1, 0), (0, -1), (0, 1)

$distance = 1; // 이동한 거리

$queue = new SplDoublyLinkedList();
$queue->unshift(["{$x}_{$y}", $distance]); // 2차원 배열로 저장. 뒤에 있는 건 현재까지 총 이동량

/* 여기서 중요한 건, 지금은 BFS로 '최단거리'를 찾는 것이기 때문에 모든 길을 탐색하지 않음에 유의한다 */

// 중간에 막힌 길 생기면 그 중간지점부터 가야 함 (그걸 큐로 만들어내야 함)

while (true){ // 막힐 때까지

    $temp_array = $queue->pop(); // x, y를 현재 위치로 초기화
    list($x, $y) = explode("_", $temp_array[0]);
    $distance = $temp_array[1] + 1; // 이동

    for ($i=0; $i < 4; $i++) { // 변화량을 주면서 길이 있는 곳을 찾는다
        $dx = $x + $direction_x[$i]; // x 변화량
        $dy = $y + $direction_y[$i]; // y 변화량

        if (isset($array[$dx][$dy]) && $array[$dx][$dy] == 1){ // 찾았으면
            $queue->unshift(["{$dx}_{$dy}", $distance]); // 큐에 넣는다
            
            // in_array는 상당히 느리기 때문에 큐에 넣었던 것은 0으로 바꾸는 걸로 한다.
            // 기존의 visited_array에서 그냥 0으로 바꾸는 걸로 함
            $array[$dx][$dy] = 0;
        }
    }

    // 도착지점에 도달한 경우
    if($x == $n-1 && $y == $m-1){
        $result = $temp_array[1];
        break;
    }

    if($queue->isEmpty()){
        break;
    }

}

echo $result;