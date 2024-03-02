<?php

fscanf(STDIN, "%d %d", $m, $k);

$result = $m % $k ? "No" : "Yes";

echo $result;