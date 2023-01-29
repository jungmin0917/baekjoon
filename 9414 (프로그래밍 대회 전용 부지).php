<?php

/**
 * 
 * 일단 배열에 담아서 sort해주고 앞에서부터 순서대로 계산하면 될 듯.
 * 
 * 일단 테스트케이스당 땅의 개수는 40개가 넘지 않음
 * 
 */
    
fscanf(STDIN, "%d", $case);

$result = "";

for($i=0; $i < $case; $i++){

    $array = array(); // 반복할 때마다 초기화

    $now_cost = 0;

    while(true){
        fscanf(STDIN, "%d", $a);
        
        if($a == 0){
            break;
        }else{
            $array[] = $a;
        }
    }

    rsort($array);
    
    $k = 0;

    for($k=0; $k < count($array); $k++){
        $now_cost += 2 * ($array[$k] ** ($k+1));

        if($now_cost > 5000000){
            $result .= "Too expensive\n";
            continue 2;
        }

    }

    $result .= $now_cost . "\n";

}

echo $result;

?>
