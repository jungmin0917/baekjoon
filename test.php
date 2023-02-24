<?php

try{

	$result = "";

	fscanf(STDIN, "%d", $r);
	fscanf(STDIN, "%s", $s);

	if($r >= 1901){
		$div = 1;
	}else if($r >= 1601){
		$div = 2;
	}else{
		$div = 3;
	}

	if(strpos($s, strval($div)) !== false){
		$result = $div;
	}else{
		if(strlen($s) == 1){
			if($div == 1){
				$result = "{$s}*";
			}else if($div == 2){
				if($s == 1){
					$result = "{$s}";
				}else{
					$result = "{$s}*";
				}
			}else{
				$result = "{$s}";
			}
		}else{
			if($div == 1){
				$result = "2*\n3*";
			}else if($div == 2){
				$result = "1\n3*";
			}else{
				$result = "1\n2";
			}
		}
	}

	echo $result;

}catch(Exception $e){
	echo $e->getMessage();
}