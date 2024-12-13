<?php

class MainClass
{
    public $matrix;

    function __construct($matrix)
    {
        $this->matrix = $matrix;
    }

    public function even($var)
    {
        return !($var & 1);
    }

    public function getEvenNumbers()
    {
        return array_filter($this->matrix, [$this, 'even']);
    }
}


$arreglo = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19);


$array = new MainClass($arreglo);


$pares = $array->getEvenNumbers();


rsort($pares);


echo implode(', ', $pares);
