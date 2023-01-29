<?php

try{

	$result = "";

	while(true){
		fscanf(STDIN, "%d %d", $a, $b);

		if(!$a && !$b){
			break;
		}

		// a: 봉제인형 수
		// b: 침실로 돌아오지 못한 봉제인형 수

		$n = $a - $b;

		if($n >= 4){
			if($n % 2 == 0){
				$result .= intdiv($n, 2) . " 0";
			}else{
				$n -= 3;
				$result .= intdiv($n, 2) . " 1";
			}
		}else if($n == 3){
			$result .= "0 1";
		}else if($n == 2){
			$result .= "1 0";
		}else{
			$result .= "0 0";
		}

		$result .= "\n";
	}

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}