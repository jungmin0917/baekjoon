<?php

fscanf(STDIN, "%d", $n);

$r = ($n / pi()) ** 0.5;

$result = (2 * $r + 2) ** 2;

echo $result;