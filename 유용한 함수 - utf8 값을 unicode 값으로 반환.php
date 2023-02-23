<?php

function ord8($c) {
    $len = strlen($c);
    if ($len <= 0) return false;

    $h = ord($c[0]);
    if ($h <= 0x7F) return $h; // 첫 번째 바이트가 0x7F 보다 작거나 같으면 한글이 아님

    // 첫 번째 바이트가 0xE0 이상 0xEF 이하인지 확인합니다.
    if ($h < 0xE0 || $h > 0xEF) return false;

    // 한글 문자의 두 번째와 세 번째 바이트를 가져옵니다.
    $b2 = ord($c[1]);
    $b3 = ord($c[2]);

    // 두 번째와 세 번째 바이트가 0x80 이상 0xBF 이하인지 확인합니다.
    if ($b2 < 0x80 || $b2 > 0xBF || $b3 < 0x80 || $b3 > 0xBF) return false;

    // 한글 유니코드 값을 계산합니다.
    return (($h & 0xF) << 12) | (($b2 & 0x3F) << 6) | ($b3 & 0x3F);
}