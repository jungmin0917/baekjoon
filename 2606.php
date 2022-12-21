<?php

/**
 * 2606 바이러스
 * 
 * 이건 그냥 바이러스 걸린 컴퓨터랑 연결된 갯수만 구하면 됨
 * 
 * 이건 DFS로 전부 길을 밝혀야 한다. 최대한 시간 아끼기
 * 
 */

fscanf(STDIN, "%d", $n); // 컴퓨터 개수

fscanf(STDIN, "%d", $m); // 라인의 수

$pair_array = array(); // 쌍 배열

for ($i=0; $i < $m; $i++) {
    fscanf(STDIN, "%d %d", $a, $b);

    $pair_array[$a][] = $b;
    $pair_array[$b][] = $a; // 양방향 필수!!!!!!
}

// BFS로 풉시다 (큐)

$queue = new SplDoublyLinkedList();

$visited_array = array();

$i = 1; // 0번부터 시작
$queue->unshift($i);
$visited_array[] = $i;

while(true){
    // 1번 먼저 큐에 넣고, BFS로 푼다

    $i = $queue->pop(); // 맨 위에 거 뺀다 (FIFO)
    
    if(isset($pair_array[$i])){
        foreach($pair_array[$i] as $v){
            if(!in_array($v, $visited_array)){
                $queue->unshift($v);
                $visited_array[] = $v;
            }
        }
    }

    if($queue->isEmpty()){
        break;
    }

}

$result = count($visited_array) - 1;

echo $result;