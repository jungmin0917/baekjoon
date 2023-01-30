<?php

try{

	$result = "";

	$min = 201;

	while(true){
		fscanf(STDIN, "%s %d", $a, $b); // 도시 이름, 최저 온도

		if(!$a){
			break;
		}

		if($b < $min){
			$min = $b;
			$city = $a;
		}

		$a = "";
	}

	$result = $city;
	
	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}