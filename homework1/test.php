<?php

/*2. Попробовать определить, на каком объеме данных применение итераторов становится выгоднее,
 чем использование чистого foreach.

RESULTS (php7.2.25)

Вывод на экран (echo)               trim строки
             $count  result                 $count  result
 Iterator     10      0.0074        Iterator     10      0.0024
 Foreach      10      3.314         Foreach      10      2.5987
 Iterator     100     0.0017        Iterator     100     0.0007
 Foreach      100     6.8902        Foreach      100     0.0002
 Iterator     150     0.0013        Iterator     150     0.0018
 Foreach      150     7.796         Foreach      150     0.0003
 Iterator     200     0.0013        Iterator     200     0.0013
 Foreach      200     0.0001        Foreach      200     0.0002
 Iterator     500     0.0053        Iterator     500     0.0032
 Foreach      500     0.0008        Foreach      500     0.0010
 Iterator     1000    0.0093        Iterator     1000    0.0099
 Foreach      1000    0.0006        Foreach      1000    0.0014
 Iterator     10000   0.0776        Iterator     10000   0.0645
 Foreach      10000   0.0004        Foreach      10000   0.0206
 Iterator     100000  0.0100        Iterator     100000  0.8066
 Foreach      100000  0.2358        Foreach      100000  0.1396
 Iterator     1000000 38.70         Iterator     1000000 7.6562
 Foreach      1000000 24.37         Foreach      1000000 1.3453

*/
const ARRAY_COUNT = 10;

$myArray = [];

for ($i = 0; $i < ARRAY_COUNT; $i++)
    $myArray[$i] = " String ";


$start = microtime(true);

/*foreach ($myArray as $value) {
    trim($value);
}

$splArrayIterator = new ArrayIterator($myArray);

while ($splArrayIterator->valid()) {
    trim($splArrayIterator->current());
    $splArrayIterator->next();

}*/

$time = microtime(true) - $start ;

echo "</br>" . $time . "</br>";




