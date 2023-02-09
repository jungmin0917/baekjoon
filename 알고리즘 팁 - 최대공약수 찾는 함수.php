<?php

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