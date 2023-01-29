<?php

$month_array = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);

fscanf(STDIN, "%d %d", $m, $d);

// 해당 날짜가 현재로부터 몇일인지 알아야 함

$total_day = 0;

for ($i = 0; $i < $m - 1; $i++) {
    $total_day += $month_array[$i];
}

$total_day += $d - 1;

switch($total_day % 7){
    case 0:
        $result = "MON";
        break;
    case 1:
        $result = "TUE";
        break;
    case 2:
        $result = "WED";
        break;
    case 3:
        $result = "THU";
        break;
    case 4:
        $result = "FRI";
        break;
    case 5:
        $result = "SAT";
        break;
    case 6:
        $result = "SUN";
        break;
    default:
        break;
}

echo $result;