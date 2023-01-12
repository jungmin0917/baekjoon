<?php

try{

	$result = "";

	while(true){
		fscanf(STDIN, "%d %d", $a, $b);

		if($a == 0 && $b == 0){
			break;
		}

		$result .= $a - abs($b - $a) . "\n";
	}

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}
