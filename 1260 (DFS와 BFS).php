<?php

/**
 * 
 * DFS와 BFS
 * 
 * 따로 태그쪽에 그래프 기초는 넣어놨음
 * 
 * 3시간 삽질 결과 내가 푼 방식으로는 안 된다는 것을 깨달음
 * 
 * 새로운 방식 도전
 * 
 */

// 값 받기
fscanf(STDIN, "%d %d %d", $n, $m, $s);

$pair_array = array();

for ($i = 0; $i < $m; $i++) {
    fscanf(STDIN, "%d %d", $a, $b);

    $pair_array[$a][$b] = true;
    $pair_array[$b][$a] = true;
}

$dfs_array = $pair_array;
$bfs_array = $pair_array;

// DFS는 스택으로 풀어볼 것이다.

$dfs_result = "";

$dfs_s = $s;

$stack = array();

$queued_array = array(); // 이거 필요함

// 시작한 것부터 stack에 넣어보자
array_unshift($stack, $dfs_s);
$queued_array[] = $dfs_s;

$count = 0;

while(true){
    
    $dfs_s = $stack[0];
    
    // 다음 단계에 먼저 첫 단계의 stack을 하나 지운다
    // 뺄 때, 값을 찾아서 두 개 다 지우도록 한다. (넣을 때 중복으로 넣었기 때문)
    // 넣을 때 중복으로 넣은 이유는, DFS이면서 복잡하게 이어진 간선이 있기 때문

    $now_shift = array_shift($stack);

    if($count > 0){
        $dfs_result .= " " . $now_shift;
    }else{
        $dfs_result .= $now_shift;
    }

    $queued_array[] = $now_shift; // 지워진 것들
    
    while(in_array($now_shift, $stack)){ // 두 개 이상 추가된 것들 지운다
        $now_key = array_search($now_shift, $stack);
        array_splice($stack, $now_key, 1);
    }

    if(isset($dfs_array[$dfs_s])){
        krsort($dfs_array[$dfs_s]);
        // 여기선 krsort 해주고 반대로 넣어야 함

        // 현재 단계에서 저장할 수 있는 것 stack에 저장
        foreach($dfs_array[$dfs_s] as $k => $v){
            if (!in_array($k, $queued_array)) {
                array_unshift($stack, $k);
            }
        }
    }

    // 여기서 stack에 아무것도 남아있지 않으면 나간다
    if(empty($stack)){
        break;
    }

    $count++;

}


// BFS는 queue로 풀어볼 것이다

$bfs_result = "";

$bfs_s = $s;

$queue = array();

$queued_array = array(); // 이거 필요함

// 시작한 것부터 queue에 넣어보자
array_push($queue, $bfs_s);
$queued_array[] = $bfs_s;

$count = 0;

while(true){
    
    $bfs_s = $queue[0];
    
    // 다음 단계에 먼저 첫 단계의 queue를 하나 지운다
    
    $now_shift = array_shift($queue);
    
    if($count > 0){
        $bfs_result .= " " . $now_shift;
    }else{
        $bfs_result .= $now_shift;
    }

    if(isset($bfs_array[$bfs_s])){
        ksort($bfs_array[$bfs_s]);

        // 현재 단계에서 저장할 수 있는 것 큐에 저장
        foreach($bfs_array[$bfs_s] as $k => $v){
            if(!in_array($k, $queued_array)){
                array_push($queue, $k);
                $queued_array[] = $k;
            }
        }
    }

    // 여기서 큐에 아무것도 남아있지 않으면 나간다
    if(empty($queue)){
        break;
    }

    $count++;

}


$result = $dfs_result."\n".$bfs_result;

echo $result;