<?php

/**
 * 
 * 2178 미로 탐색
 * 
 * 처음으로 인접행렬로 된 문제를 푼다
 * 
 * https://velog.io/@abcd8637/%EC%9D%B4%EA%B2%83%EC%9D%B4-%EC%BD%94%EB%94%A9%ED%85%8C%EC%8A%A4%ED%8A%B8%EB%8B%A4-16%EC%9D%BC%EC%B0%A8
 * 위의 링크를 참고하기
 * 
 * 특정한 지점의 주변 상, 하, 좌, 우를 살펴본 뒤에 주변 지점 중 값이 0이면서 아직 방문하지 않은 지점이 있다면 해당 지점을 방문한다.
 * 방문한 지점에서 다시 상, 하, 좌, 우를 살펴보면서 방문을 다시 진행하면, 연결된 모든 지점을 방문 할 수 있다.
 * 
 * PHP의 경우 아래의 글을 참조해보자
 * https://www.sitepoint.com/data-structures-4/
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

print_r($array);

$x = 0;
$y = 0;

// 4방향 탐색이므로 아래와 같이 미리 array를 만들어 놓고, dx, dy로 변화값을 주면서 탐색한다
// 만약 해당 방향으로 가서 정상적으로 길에 도달하면 길을 push한다.
$direction_x = array(-1, 1, 0, 0);
$direction_y = array(0, 0, -1, 1);
// 각각 좌, 우, 하, 상을 의미 (-1, 0), (1, 0), (0, -1), (0, 1)

$visited_array = array();
$queue = new SplDoublyLinkedList();
$queue->unshift("{$x}_{$y}");

$count = 1; // 총 필요한 거리. 1로 시작 (출발지점 포함)

// 노드 하나씩 순회하면서 탐색 (어차피 도착지점이 n-1, m-1일 때이므로 그냥 쭉 하면 됨)
for ($i=0; $i < $n; $i++) { 
    for ($j=0; $j < $m; $j++) { 

        
        
        // 더 이상 갈 수 있는 곳이 없는 경우
        if($queue->isEmpty()){
            break;
        }

    }
}

