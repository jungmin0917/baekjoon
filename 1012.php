<?php

fscanf(STDIN, "%d", $case);

$result = "";

for ($i=0; $i < $case; $i++) {
    fscanf(STDIN, "%d %d %d", $m, $n, $k);

    $array = array_fill(0, $m, array_fill(0, $n, 0));

    $stack = new SplStack(); // stack 사용. shift, unshift로 풀어볼 것이다

    $count = 0; // 덩어리 갯수

    // 몇 덩어리로 떨어져있는지를 세면 됨

    for ($j=0; $j < $k; $j++) {
        list($a, $b) = fscanf(STDIN, "%d %d");
        $array[$a][$b] = 1;
        $stack->unshift($a); // x, y 따로따로 넣어야 함.. (explode 개느림)
        $stack->unshift($b); // 다만 이렇게 하면 stack이기 때문에 뺄 땐 y부터 빠짐
    }

    // 방향은 4방향
    $dx = [1, -1, 0, 0];
    $dy = [0, 0, 1, -1];

    while(!$stack->isEmpty()){ // 스택이 있는 동안 반복
        // dfs로 푼다
        $y = $stack->shift(); // 스택이라 y부터 빼야 함
        $x = $stack->shift();

        if($array[$x][$y] == 1){ // 현재가 시작점이면
            $array[$x][$y] = 3; // 시작점은 특별히 3으로 표시하고 시작점 count.
            $count++;
        }

        // 지나간 길은 2로 하고, 시작점만 세면 그게 결국 한 덩어리 아니겠는가
        for ($j=0; $j < 4; $j++) { 
            $nx = $x + $dx[$j];
            $ny = $y + $dy[$j];

            if($nx >= 0 && $nx < $m && $ny >= 0 && $ny < $n && $array[$nx][$ny] == 1){ // 이동한 곳에 1이 있으면 2로 바꾼다 (지나간 길은 2로 하자. 지나가지 않은 길은 1인 상태임)
                $array[$nx][$ny] = 2; // 지나간 길
                $stack->unshift($nx);
                $stack->unshift($ny);
            }
        }
    }

    $result .= $count . "\n";

}

echo $result;