<?php

try{

	$result = "";

    fscanf(STDIN, "%d", $n);

    for ($i=0; $i < $n; $i++) {
        fscanf(STDIN, "%f %f %f", $a, $b, $c);

        $result .= "$" . number_format($a * $b * $c, 2, '.', '') . "\n";
    }

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}