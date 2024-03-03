<?php

$result = "";

$s = trim(fgets(STDIN));

$len = strlen($s);

if ($s[0] == "\"" && $s[$len - 1] == "\"") {
    $result = substr($s, 1, $len - 2);
}

if (!$result) {
    $result = "CE";
}

echo $result;
