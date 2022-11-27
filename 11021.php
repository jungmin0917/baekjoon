<?php

fscanf(STDIN, "%d", $n);

$result = "";

for($i=1; $i <= $n; $i++){
    fscanf(STDIN, "%d %d", $a, $b);

    $c = $a + $b;

    $result .= "Case #{$i}: {$c}\n";
}

echo $result;