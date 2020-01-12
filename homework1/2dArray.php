<?php
/*4
*. Требуется написать метод, принимающий на вход размеры двумерного массива и
 выводящий массив в виде инкременированной цепочки чисел, идущих по спирали.
Примеры:
2х3
1 2
6 3
5 4

3х1
1 2 3
4х4
01 02 03 04
12 13 14 05
11 16 15 06
10 09 08 07*/

function showArrayInSpiral($width, $height)
{
    $dataToShow = "";
    $array = getSnailArray($width, $height);

    foreach ($array as $row) {
        foreach ($row as $value) {
            $dataToShow .= $value . " ";
        }

        $dataToShow .= "</br>";

    }

    return $dataToShow;


}

function getSnailArray($width, $height)
{
    $array = [];

    $x = 0;
    $y = 0;
    $steps = $width * $height;


    for ($i = 1; $i <= $steps ;) {

        for ($k = 0; $k < $width; $k++)  {
            if ($i <= 9){
                $i = 0 . $i ;
            }
            $array[$x][$y] = $i;
            $i++;
            $y++;
        }
        $x++;
        $y--;
        $width--;



        for ($l = 1; $l < $height; $l++) {
            if ($i <= 9){
                $i = 0 . $i ;
            }
            $array[$x][$y] = $i;
            $i++;
            $x++;
        }

        $x--;
        $y--;
        $height--;



        for ($m = 0; $m < $width; $m++) {
            if ($i <= 9){
                $i = 0 . $i ;
            }
            $array[$x][$y] = $i;
            $i++;
            $y--;
        }

        $x--;
        $y++;
        $width--;



        for ($n = 1; $n < $height; $n++ ) {
            if ($i <= 9){
                $i = 0 . $i ;
            }
            $array[$x][$y] = $i;
            $i++;
            $x--;
        }


        $x++;
        $y++;
        $height--;

    }
    foreach ($array as &$subArr){
        ksort($subArr);
    }
    return $array;
}


echo showArrayInSpiral(3, 7);





