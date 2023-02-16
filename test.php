<?php

try{

	$result = "";

	while($input = trim(fgets(STDIN))){
		list($n, $b, $m) = explode(" ", $input);

		// n원 저금 후 1년이 지날 때마다 통장에 저금되어 있는 돈의 B% 만큼이 이자로 적립됨
		// 몇 년이 지나야 통장의 돈이 M원을 넘을지 구하기

		$rate = $m / $n;
		$bogri = 1 + ($b / 100);

		$result .= ceil(log($rate) / log($bogri)) . "\n";

		// 기간은 log(목표 자금 / 현재 자금) / log(1 + 복리 이자율)이다
	}

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}