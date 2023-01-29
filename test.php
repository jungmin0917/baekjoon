<?php

try{

	$result = "";

	fscanf(STDIN, "%s %s", $a, $b);

	$result = bigdiv($a, $b);

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}
