<?php

try{

	$result = "";

	fscanf(STDIN, "%d %d %d", $a, $b, $c); // 고정비용, 가변비용, 판매가격

	// 손익분기점이 발생하려면 판매 가격이 가변 비용보다 커야 한다

	if($b >= $c){
		$result = -1;
	}else{
		$result = floor($a / ($c - $b)) + 1;
	}

	echo $result;

}catch(Exception $e){
	echo $e->getMessage();
}