<?php
const COUNT = 1000;
const MIN_RAND = 1;
const MAX_RAND = 3000;


function _randArray ($count = COUNT, $minRand = MIN_RAND, $maxRand = MAX_RAND):array {
	if ($count != COUNT && $count>$maxRand-$minRand)  {
		$minRand = 1;
		$maxRand = $count * 3;
	}
	$myArray = [];
	for ($i= 0; $i < $count; $i++) {
//		do {
			$num = mt_rand($minRand, $maxRand);
//		} while (in_array($num, $myArray)) ;
		$myArray[] = $num;
	}
	return $myArray;
}
