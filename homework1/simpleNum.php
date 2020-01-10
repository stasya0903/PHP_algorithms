<?php
//Выписав первые шесть простых чисел, получим 2, 3, 5, 7, 11 и 13.
// Очевидно, что 6-ое простое число - 13. Какое число является 10001-ым простым числом?


function getSimpleNumberOn($count)
{
    $simpleNumbersCount = 1;
    for ($i = 2; $simpleNumbersCount < $count + 1; $i++) {
        if (isSimple($i)) {
            if ($simpleNumbersCount == $count) {
                return $i;
            }
            $simpleNumbersCount++;
        }
    }
}


function isSimple($num)
{
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

echo getSimpleNumberOn(10001);



