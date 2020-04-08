<?php
include 'randArray.php';

/*1. Определить сложность следующих алгоритмов:
- Поиск элемента массива с известным индексом*/
function findElement($array, $index){
    return $array[$index];
}
// bigO = O(1)

/*- Дублирование одномерного массива через foreach*/

function doubleArray($array){
    $newArr = [];

    foreach ($array as $element => $value){
        $newArr[$element] = $value;
    }

    return $newArr;
}

// bigO = O(N)

/*    - Рекурсивная функция нахождения факториала числа*/

function factorial ($number) {
    if ($number <=0 ){
        return 1;
    }
    return $number * factorial  ($number-1);
}

// bigO = O(N)

/*2.Определить сложность следующих алгоритмов. Сколько произойдет итераций?*/

$n = 100;
$array[]= [];
//первый цикл f(n) = O(N)
for ($i = 0; $i < $n; $i++) {
    //Второй цикл f(g) = O(log(N)) 2
    for ($j = 1; $j < $n; $j *= 2) {
       // echo $i . "/" . $j .  "</br>";
        $array[$i][$j]= true;
    } }
// bigO = O(N * log(N))

$n = 50;
$array[] = [];
$k = 1;
//первый цикл f(n) = O(N/2)
for ($i = 0; $i < $n; $i += 2) {
    //Второй цикл f(g) = f(n)
    for ($j = $i; $j < $n; $j++) {
        $array[$i][$j]= true;
    }
}

// bigO = O(N/2 * N/2)




/*3. Дан массив из n элементов, начиная с 1. Каждый следующий элемент равен (предыдущий + 1). Но в массиве гарантированно 1 число пропущено. Необходимо вывести на экран пропущенное число.
Примеры:
[1, 2 ,3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 14, 15, 16] => 11
[1, 2, 4, 5, 6] => 3
*/

function getMissingNumber1($array){

    $length = count($array);
    if($length == 0){
        return 1;
    }
    $sum = array_sum($array);
    $lastEl = $array[array_key_last($array)];
    $expectedSum = ($lastEl / 2) * ($lastEl + 1);

    return  $expectedSum - $sum ;
}


function getMissingNumber2($array){

    for($i = 1; $i <= count($array); $i++){

        if($array[$i-1] != $i){
            return $i;
        }
    }

    return 1;


}

function getMissingNumber3($array){

    $arrOrdered = [];

    for($i = 1; $i <= count($array) + 1; $i++){
        $arrOrdered[] = $i;
    }

   return array_sum($arrOrdered) - array_sum($array);


}

$array = [];

echo getMissingNumber3($array);