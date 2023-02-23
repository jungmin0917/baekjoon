<?php

try{

	$result = "";

	fscanf(STDIN, "%s", $s);

	$len = strlen($s);

	$m = $len / 3;

	for ($i=0; $i < $m; $i++) {
		// 문자 하나의 유니코드 값을 먼저 출력
		$unicode = utf8_to_unicode(substr($s, (3 * $i), (3 * ($i + 1))));

		echo $unicode . "\n";
	}

	echo $result;

}catch(Exception $e){
	echo $e->getMessage();
}

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