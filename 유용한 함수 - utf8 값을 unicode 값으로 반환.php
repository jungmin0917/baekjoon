<?php


// mb 모듈이 없으므로 UTF-8 인코딩 규칙에 따라 문자열을 분석하여 코드 포인트 값을 계산한다
// UTF-8로 인코딩된 한글은 3바이트의 길이를 가진다
// UTF-8에서는 첫 바이트의 상위 바이트가 1로 시작하면 해당 문자가 몇 바이트로 구성되어 있는지를 나타낸다
// 한글은 3바이트로 구성되므로, 첫 바이트의 상위 비트는 1110이 된다
// 첫번째 바이트에서 나머지 5비트를 추출한다
// 두번째 바이트와 세번째 바이트에서 나머지 6비트를 추출한다
// 뭔 소린지 잘 모르겠음

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