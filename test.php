<?php

try{

	$result = "";

	fscanf(STDIN, "%s", $s);

	$len = strlen($s);

	$search = "2023";
	$j = 0; // 찾는 index

	$res = false;

	for ($i=0; $i < $len; $i++) { 
		if($s[$i] == $search[$j]){
			$j++;
		}

		if($j == 4){
			$res = true;
			break;
		}
	}

	if($res){
		
	}

	echo $result;

}catch(Exception $e){
	echo $e->getMessage();
}