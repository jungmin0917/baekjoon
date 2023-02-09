<?php

try{

	$result = "";

	fscanf(STDIN, "%d %d", $n, $c);

	// 최대공약수부터 찾아야 함
	echo euclid(4, 6);

	// 최소공배수 찾기

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}

// 최대공약수 찾는 함수
function euclid($a, $b){
	// 큰 거 % 작은 거 = 0이 될 때가 최대공약수

	list($max, $min) = [max($a, $b), min($a, $b)];

	while(true){
		if($max % $min == 0){
			return $min;
		}else{
			list($max, $min) = [$min, $max % $min];
		}
	}
}