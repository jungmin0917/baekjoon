<?php

try{

	$result = "";

	fscanf(STDIN, "%d %d %d", $a, $b, $c);

	$ab = $a * $b;

	// 정수부, 소수부를 따로 나누어 계산한다는 idea가 필요.

	// max precision이 16~17자리인 것을 감안하여
	// 정수 부분, 소수 부분을 따로 계산하여 합치는 방식으로 가도록 할 것이다

	// 나머지 연산은, for문으로 가정했을 때, 그냥 빼기만 하면 되는 거라 max precision issue가 없을 것이라고 생각됨

	$integer = intdiv($a * $b, $c); // 정수 부분 나눗셈

	$decimal = strval(($a * $b % $c) / $c); // decimal은 소수를 뜻함. 이렇게 하면 나머지를 c로 나누는 거라 충분히 가능

	$decimal = str_replace("0.", "", $decimal);

	$result = "{$integer}.{$decimal}";

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}