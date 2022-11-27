<?php

$result = "";

/* 이건 왜 안 되는지 모르겠음 
while($n = fgets(STDIN)){
    if($n == "0 0"){
        break;
    }
    
    $arr = explode(" ", $n);

    $sum = 0;

    foreach($arr as $v){
        $sum += (int)$v;
    }

    $result .= "{$sum}\n";
}
*/


while(fscanf(STDIN, "%d %d", $a, $b)){
	if($a == 0 && $b == 0){
		break;
	}
	
    $sum = $a + $b;
    
    $result .= $sum . "\n";
}

echo $result;