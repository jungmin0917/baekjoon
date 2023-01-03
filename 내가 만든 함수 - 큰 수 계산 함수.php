<?php

// string으로 계산하는 함수 만들기
function bigsum($a, $b){
    // 각 자리로 따로 더하고 
    // 일단 -인지 +인지 확인해야 함
    $a_array = str_split($a);
    $b_array = str_split($b);

    // 둘 다 -이거나 둘 다 +인 경우와 둘 중 하나만 +인 경우로 나눈다

    if($a_array[0] == '-' && $b_array[0] == '-' || $a_array[0] != '-' && $b_array[0] != '-'){ // 둘 다 양수거나 둘 다 음수

        if ($a_array[0] == '-' && $b_array[0] == '-') { // 둘 다 양수
            array_shift($a_array);
            array_shift($b_array);

            $negative = true;
        }

        // 끝 자리수부터 계산해야 하므로 뒤집는다
        $a_array = array_reverse($a_array);
        $b_array = array_reverse($b_array);

        $a_count = count($a_array);
        $b_count = count($b_array);

        // 둘 중 큰 자리수를 가진 수만큼 반복
        $count = $a_count > $b_count ? $a_count : $b_count;

        $carry = 0; // 자리올림

        $sum_array = array(); // array로 한 후 다시 합칠 것임

        for ($i=0; $i < $count; $i++) { 
            if(!isset($a_array[$i])){ // 해당 자리수에 없을 경우
                $a_array[$i] = 0;
            }
            if(!isset($b_array[$i])){
                $b_array[$i] = 0;
            }

            if($a_array[$i] + $b_array[$i] + $carry >= 10){ // 자리올림이 생길 경우
                $sum_array[] = $a_array[$i] + $b_array[$i] - 10 + $carry;
                $carry = 1;
            }else{ // 생기지 않을 경우
                $sum_array[] = $a_array[$i] + $b_array[$i] + $carry;
                $carry = 0;
            }
        }

        // 아직까지 carry가 남아 있으면 마지막에 하나 추가
        if($carry == 1){
            $sum_array[] = 1;
        }

        if($negative){
            $sum_array[] = "-";
        }

        $sum_array = array_reverse($sum_array); // 다시 뒤집음

        return implode("", $sum_array); // 합쳐서 리턴

    }else{ // 둘 중 하나만 양수
        // 일단 먼저 음수인 것을 확인해야 함

        // 음수인 거에서 마이너스 제거하고, 제거한 후 자리수가 차이나면 괜찮은데 차이가 없으면 곤란함
        if($a_array[0] == '-'){
            array_shift($a_array);
            $negative = 'a';
        }else if($b_array[0] == '-'){
            array_shift($b_array);
            $negative = 'b';
        }

        // 끝 자리수부터 계산해야 하므로 뒤집는다
        $a_array = array_reverse($a_array);
        $b_array = array_reverse($b_array);

        $a_count = count($a_array);
        $b_count = count($b_array);

        if($a_count == $b_count){ // 자리수가 같은 경우 (복잡함)

            $count = $a_count;

            $borrow = 0; // 받아내림

            $sub_array = array(); // array로 한 후 다시 합칠 것임

            for ($i=0; $i < $count; $i++) { 

                if($a_array[$i] - $b_array[$i] + $borrow < 0){ // 받아내림이 생길 경우

                    $sub_array[] = 10 + $a_array[$i] - $b_array[$i] + $borrow;
                    $borrow = -1;

                }else{ // 생기지 않을 경우
                    $sub_array[] = $a_array[$i] - $b_array[$i] + $borrow;
                    $borrow = 0;
                }
            }

            if($borrow == -1){ // 마지막 자리에서도 내림이 남는 경우
                // 각 자리에서 (10 - 각 자리 - 1)를 해 준다. (첫 자리는 10 - 각 자리)
                for($i = 0; $i < $count; $i++){
                    if($i == 0){
                        $sub_array[$i] = 10 - $sub_array[$i];
                    }else{
                        $sub_array[$i] = 10 - $sub_array[$i] - 1;
                    }
                }
            }

            $sub_array = array_reverse($sub_array); // 다시 뒤집음
            
            // 앞에서부터 0인 원소들 제거
            while($sub_array[0] == 0){
                array_shift($sub_array);
            }

            $sub = implode("", $sub_array); // 합쳐서 리턴

            if($borrow == -1){
                $sub = "-" . $sub;
            }

            return $sub;

        }else{ // 자릿수가 다른 경우
            
            if(($a_count > $b_count && $negative == 'a') || ($b_count > $a_count && $negative == 'b')){ // 큰 쪽이 마이너스인 경우
                echo $negative . "\n";
                $negative = true;
            }else{ // 이외의 경우 
                $negative = false;
            }

            // 둘 중 큰 자리수를 가진 수만큼 반복
            $count = $a_count > $b_count ? $a_count : $b_count;

            if($b_count > $a_count){ // 뒤에가 더 큰 경우 바꿔서 계산한다
                $temp_array = $a_array;
                $a_array = $b_array;
                $b_array = $temp_array;
            }

            $borrow = 0; // 받아내림

            $sub_array = array(); // array로 한 후 다시 합칠 것임

            for ($i=0; $i < $count; $i++) { 
                if(!isset($a_array[$i])){ // 해당 자리수에 없을 경우
                    $a_array[$i] = 0;
                }
                if(!isset($b_array[$i])){
                    $b_array[$i] = 0;
                }
                
                if($a_array[$i] - $b_array[$i] + $borrow < 0){ // 받아내림이 생길 경우
                    $sub_array[] = 10 + $a_array[$i] - $b_array[$i] + $borrow;
                    $borrow = -1;
                }else{ // 생기지 않을 경우
                    $sub_array[] = $a_array[$i] - $b_array[$i] + $borrow;
                    $borrow = 0;
                }
            }

            $sub_array = array_reverse($sub_array); // 다시 뒤집음
            
            // 앞에서부터 0인 원소들 제거
            while($sub_array[0] == 0){
                array_shift($sub_array);
            }
            
            $sub = implode("", $sub_array); // 합쳐서 리턴

            if($negative){
                $sub = "-" . $sub;
            }

            return $sub;
        } 
    }
}

echo bigsum('9223372036854775807', '9223372036854775808');