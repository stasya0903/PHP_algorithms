<?php
/*1. Рассмотреть структуры данных Nested Sets и Clojure table*/

/*2. Реализовать решение задачи #3 из практического задания №2 (пропущенное число в цепочке),
# упростив сложность до O(logn) при помощи парадигмы "Разделяй и властвуй" (бинарный поиск)
Примеры:
[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3*/

$array = [];
function getMissingNumber2($array)
{
    $count = count($array);
    $left = 0;
    $right = $count - 1;

    if (!isset($array[$right])) {
        return 1;
    }

    if ($array[$right] == $count) {
        echo "There is no missing numbers in array";
        return null;
    }

    while ($left <= $right) {
        $middle = floor(($left + $right) / 2);
        $expectedValue = $middle + 1;
        if ($right == $left) {
            return $expectedValue;
        }
        if ($array[$middle] == $expectedValue) {
            $left = $middle + 1;
        } else {
            $right = $middle;
        }
    }
}

//echo getMissingNumber2($array);
/*3. Простые делители числа 13195 - это 5, 7, 13 и 29. Каков самый большой делитель числа 600851475143,
являющийся простым числом?*/

$num = 600851475143;

function getBiggestSimpleDivider($num)
{
    $divider = $num -1;

    if ($num > 100){
        $divider = $num / 2;
    }
    if ($num > 10000){
        $divider = floor(sqrt($num)/2);
    }

    for ($i = $divider; $i > 0; $i--){
        if ( $num % $i != 0 )  {
            continue;
        }
        if (isSimple($i)){
            return $i;
        }
    }
    if (isSimple($num)){
        return $num;
    }

}

function isSimple($num)
{
    if ($num == 1){
        return false;
    }
    if ($num == 2 || $num == 3) {
        return true;
    }
    if ($num % 2 == 0 || $num % 3 == 0) {
        return false;
    }
    $limit = (int)(sqrt($num)) + 1;
    for ($i = 3; $i < $limit; $i += 2) {
        if ($num % $i == 0) {
            return false;
        }

    }

    return true;
}

/*function getSimpleNumbersArray($num)
{
    $simpleNumberArray = [2];
    for ($i = 3; $i < $num; $i += 2) {
        $count = count($simpleNumberArray);
        for ($j = 0; $j <= $count - 1; $j++) {
            if ($i % $simpleNumberArray[$j] == 0) {
                break;
            }
            if ($j == $count - 1) {
                $simpleNumberArray[] = $i;
                break;
            }

        }
    }
    return $simpleNumberArray;

}*/

echo getBiggestSimpleDivider($num);


