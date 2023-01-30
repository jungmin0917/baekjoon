<?php

try{

	$result = "";

	fscanf(STDIN, "%d", $n);

	
	
	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}