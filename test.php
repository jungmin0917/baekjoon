<?php

try{

	$result = "";

	fscanf(STDIN, "%s", $s);

	$len = strlen($s);


	for ($i=0; $i < $len; $i++) {
		
	}

	echo $result;

}catch(Exception $e){
	echo $e->getMessage();
}

<?php
function utf8_to_unicode($str) {
    $code_point = 0;
    $len = strlen($str);
    $byte = 0;
    for ($i = 0; $i < $len; $i++) {
        $byte = ord($str[$i]);
        if ($byte < 128 || $byte > 191) {
            $code_point = ($code_point << 6) | ($byte & 0x7F);
        } else {
            $code_point = ($code_point << 6) | ($byte & 0x3F);
        }
    }
    return $code_point;
}