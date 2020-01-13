<?php


class SnailArray
{
    protected $array = [];
    protected $html = "";

    public function drawSnail($width, $height)
    {
        $array = $this->fillArray($width, $height);
        $this->array = $this->sort($array);
        $this->fillHtml($this->array);
        return $this->html;


    }

    /**
     * @param $width integer ширина спирали
     * @param $height integer длина спирали
     * @return array двухмерный массив из кол-ва массивов равного height содержащий кол-вл элементов равный width
     */


    private function fillArray($width, $height)
    {
        $array = [];
        $x = 0;//координата по вертикали
        $y = 0;//координата по горизонтали
        $steps = $width * $height;// общее количество необходимых шагов

        //заполняем массив до необходимого кол-ва шагов цифрами от 1 до $steps
        for ($i = 1; $i <= $steps;) {

            //идем вправо на количество шагов равное текущей ширине, увеличиваем координаты по горизонтали
            for ($k = 0; $k < $width; $k++) {
                $i = $this->addZeroToUnits($i);
                $array[$x][$y] = $i;
                $i++;
                $y++;
            }
            //спускаемся на шаг ниже , уменьшаем ширину
            $x++;
            $y--;
            $width--;

            //идем вниз  на количество шагов равное текущей высоте, увеличиваем координаты по вертикали
            for ($l = 1; $l < $height; $l++) {
                $i = $this->addZeroToUnits($i);
                $array[$x][$y] = $i;
                $i++;
                $x++;
            }
            //продвигаемся на шаг влево, уменьшаем высоту
            $x--;
            $y--;
            $height--;

            //идем влево на количество шагов равное текущей ширине, уменьшаем  координаты по горизонтали
            for ($m = 0; $m < $width; $m++) {
                $i = $this->addZeroToUnits($i);
                $array[$x][$y] = $i;
                $i++;
                $y--;
            }
            //спускаемся на шаг ниже , уменьшаем ширину
            $x--;
            $y++;
            $width--;

            //идем вверх  на количество шагов равное текущей высоте, уменьшаем координаты по вертикали
            for ($n = 1; $n < $height; $n++) {
                $i = $this->addZeroToUnits($i);
                $array[$x][$y] = $i;
                $i++;
                $x--;
            }
            //поднимаемся  на шаг выше , уменьшаем ширину
            $x++;
            $y++;
            $height--;

        }
        return $array;
    }

    private function sort(array $array)
    {
        foreach ($array as &$subArr) {
            ksort($subArr);
        }
        return $array;

    }

    private function fillHtml(array $array)
    {
        foreach ($array as $row) {
            foreach ($row as $value) {
                $this->html .= $value . " ";
            }

            $this->html .= "</br>";

        }

    }

    private function addZeroToUnits(int $i)
    {
        if ($i <= 9) {
            $i = 0 . $i;
        }
        return $i;
    }


}