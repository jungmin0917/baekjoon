<?php

try{

	$result = "";

	$a = trim(fgets(STDIN));
	$b = trim(fgets(STDIN));
	$c = trim(fgets(STDIN));

	$result = bigdiv(bigsum($b, "-" . $c), $a);
	
	echo $result;

}catch(Exception $e){
	echo $e->getMessage();
}

function bigdiv($a, $b){
    
    $a = str_split($a);
    $b = str_split($b);

    $len = count($b);

    if(count($a) < count($b)){
        return "0\n" . implode($a);
    }
    
    $diff = count($a) - count($b); // 현재 피제수 빼는 자리 수 (피제수의 길이 - 제수의 길이)

    $now_count = array(); // 현재 수 count array

    for ($j=0; $j <= $diff; $j++) { 
        $count = 0; // 현재 자리에서 성공적으로 뺀 수

        while(true){ // 현재 위치에서 피제수가 제수보다 클 동안 반복

            // 제대로 계산하기 전에 일단 temp로 계산할 것
            $temp = $a;

            for ($k = $len - 1; $k >= 0; $k--) {

                if ($temp[$k + $j] - $b[$k] < 0) {
                    if (isset($temp[$k + $j - 1])) { // 그 앞자리가 있는 경우라면
                        $temp[$k + $j] = $temp[$k + $j] + 10 - $b[$k];
                        $temp[$k + $j - 1]--;
                    } else { // 그 앞자리가 없는 경우라면
                        // 원상복구 해야 함
                        $temp = $a; // 원상복구
                        break 2;
                    }
                } else {
                    $temp[$k + $j] -= $b[$k];
                }
            }

            // 피제수의 맨 앞자리가 -이면 원상복구 하고 다음 줄로 넘어가기
            if(isset($temp[$j - 1]) && $temp[$j - 1] < 0){
                $temp = $a; // 원상복구
                break;
            }else{
                // 여기까지, 정상적으로 뺐을 경우에만 a에 적용한다
                $a = $temp;

                // 정상적으로 다 뺐으면
                $count++;
            }
        }

        $now_count[] = $count;
    }

    // 몫도 앞의 0 지우기
    while(isset($now_count[0]) && $now_count[0] == 0){
        array_shift($now_count);
    }

    if(!isset($now_count[0])){
        $now_count = 0;
    }else{
        $now_count = implode($now_count);
    }

    // 앞의 0 지우기
    while(isset($a[0]) && $a[0] == 0){
        array_shift($a);
    }

    if(!isset($a[0])){
        $a = 0;
    }else{
        $a = implode($a);
    }

    return "{$now_count}";
}

function bigsum($a, $b){
    // 각 자리로 따로 더하고 
    // 일단 -인지 +인지 확인해야 함
    $a_array = str_split($a);
    $b_array = str_split($b);

    // 둘 다 -이거나 둘 다 +인 경우와 둘 중 하나만 +인 경우로 나눈다

    if($a_array[0] == '0' && $b_array[0] == '0'){
        return "0";
    }

    if(($a_array[0] == '-' && $b_array[0] == '-') || ($a_array[0] != '-' && $b_array[0] != '-')){ // 둘 다 양수거나 둘 다 음수

        if ($a_array[0] == '-' && $b_array[0] == '-') { // 둘 다 음수
            array_shift($a_array);
            array_shift($b_array);

            $negative = true;
        }else{ // 둘 다 양수
            $negative = false;
        }

        // 끝 자리수부터 계산해야 하므로 뒤집는다
        $a_array = array_reverse($a_array);
        $b_array = array_reverse($b_array);

        $a_count = count($a_array);
        $b_count = count($b_array);

        // 둘 중 큰 자리수를 가진 수만큼 반복
        $count = $a_count >= $b_count ? $a_count : $b_count;

        $carry = 0; // 자리올림

        $sum_array = array(); // array로 한 후 다시 합칠 것임

        for ($i=0; $i < $count; $i++) {

            if(!isset($a_array[$i])){ // 해당 자리수에 없을 경우
                $a_array[$i] = 0;
            }else{
                $a_array[$i] = intval($a_array[$i]);
            }

            if(!isset($b_array[$i])){
                $b_array[$i] = 0;
            }else{
                $b_array[$i] = intval($b_array[$i]);
            }

            if($a_array[$i] + $b_array[$i] + $carry >= 10){ // 자리올림이 생길 경우
                $sum_array[] = $a_array[$i] + $b_array[$i] + $carry - 10;
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

            // 네거티브를 아래쪽으로 내려 풀어야 함
            if($negative == 'a'){
                $temp_array = $a_array;
                $a_array = $b_array;
                $b_array = $temp_array;
            }

            $count = $a_count;

            $borrow = 0; // 받아내림

            $sub_array = array(); // array로 한 후 다시 합칠 것임

            for ($i=0; $i < $count; $i++) { 
                $a_array[$i] = intval($a_array[$i]);
                $b_array[$i] = intval($b_array[$i]);

                if($a_array[$i] - $b_array[$i] + $borrow < 0){ // 받아내림이 생길 경우

                    $sub_array[] = 10 + $a_array[$i] - $b_array[$i] + $borrow;
                    $borrow = -1;

                }else{ // 생기지 않을 경우
                    $sub_array[] = $a_array[$i] - $b_array[$i] + $borrow;
                    $borrow = 0;
                }
            }

            if($borrow == -1){ // 마지막 자리에서도 내림이 남는 경우 (뒤의 수가 더 크다는 것이다)
                // 순서 바꿔서 다시 해준다
                $temp_array = $a_array;
                $a_array = $b_array;
                $b_array = $temp_array;
                
                $borrow = 0; // 받아내림

                $sub_array = array(); // array로 한 후 다시 합칠 것임

                for ($i=0; $i < $count; $i++) { 
                    $a_array[$i] = intval($a_array[$i]);
                    $b_array[$i] = intval($b_array[$i]);

                    if($a_array[$i] - $b_array[$i] + $borrow < 0){ // 받아내림이 생길 경우

                        $sub_array[] = 10 + $a_array[$i] - $b_array[$i] + $borrow;
                        $borrow = -1;

                    }else{ // 생기지 않을 경우
                        $sub_array[] = $a_array[$i] - $b_array[$i] + $borrow;
                        $borrow = 0;
                    }
                }

                $borrow = -1; // 무조건 뒤의 수가 크다는 게 정해진 경우
            }

            $sub_array = array_reverse($sub_array); // 다시 뒤집음
            
            // 앞에서부터 0인 원소들 제거
            while(isset($sub_array[0]) && $sub_array[0] == 0){
                array_shift($sub_array);
            }

            $sub = implode("", $sub_array); // 합쳐서 리턴

            if($borrow == -1){ // 받아내림이 아직 있는 경우
                $sub = "-" . $sub;
            }

            if(!$sub){
                $sub = 0;
            }

            return $sub;

        }else{ // 자릿수가 다른 경우
            
            if(($a_count > $b_count && $negative == 'a') || ($b_count > $a_count && $negative == 'b')){ // 큰 쪽이 마이너스인 경우
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
                }else{
                    $a_array[$i] = intval($a_array[$i]);
                }

                if(!isset($b_array[$i])){
                    $b_array[$i] = 0;
                }else{
                    $b_array[$i] = intval($b_array[$i]);
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
            while(isset($sub_array[0]) && $sub_array[0] == 0){
                array_shift($sub_array);
            }
            
            $sub = implode("", $sub_array); // 합쳐서 리턴

            if($negative){
                $sub = "-" . $sub;
            }

            if(!$sub){
                $sub = 0;
            }

            return $sub;
        } 
    }
}
