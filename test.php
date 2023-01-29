<?php

try{

	$result = "";

	fscanf(STDIN, "%d %d %d", $p1, $p2, $p3); // 각 물품의 가격
	fscanf(STDIN, "%d %d %d", $c1, $c2, $c3); // c1은 전체 구매 할인쿠폰 (단독사용만 가능), c2, c3는 하나의 물품에 할인을 제공하는 쿠폰의 할인율

	// 전체 금액 쿠폰이 더 싸면 one과 절약한 금액
	// 두 개의 쿠폰이 더 싸면, two와 절약 가능한 최대 금액
	// 소수점 둘째자리까지

	

	echo $result;

}catch(Exception $e){
	$result = $e->getMessage();
}
