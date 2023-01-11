<?php

try{

	$result = "";

	while(true){
		fscanf(STDIN, "%d", $n);

		if(!$n){
			break;
		}

		$array = str_split($n);

		$ten = 0;

		$c = count($array);

		for ($i=$c; $i >= 1; $i--) {
			$ten += $array[$c - $i] * factorial($i);
		}

		$result .= $ten . "\n";
	}

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}

function factorial($n){

	$result = 1;

	for ($i=1; $i <= $n; $i++) { 
		$result *= $i;
	}

	return $result;
}