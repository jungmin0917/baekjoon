<?php

try{

	$result = "";

	fscanf(STDIN, "%d", $case);

	$text = "";

	while(($buffer = fgets(STDIN, 4096)) !== false){
		$text .= $buffer;
	}

	$array = explode("\n", $text);

	for ($i=0; $i < $case; $i++) {
		$result .= min(explode(" ", $array[$i * 2 + 1])) . " " . max(explode(" ", $array[$i * 2 + 1])) . "\n";
	}

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}
