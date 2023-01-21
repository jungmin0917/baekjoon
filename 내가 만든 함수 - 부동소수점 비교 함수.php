<?php

function isSame($f1, $f2, $epsilon = 0.00001){
    $sub = abs($f1 - $f2);

    if($sub < $epsilon){
        return true;
    }else{
        return false;
    }
}