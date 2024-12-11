<?php
// Calculate the Factorial of a Number
// Write a function to calculate the factorial of a number. Extend the functionality by:

// Accepting both positive and negative integers.
// Returning a custom error message for negative numbers.



class CalculateFactorial
{
    public $i;
    public $initialValue;
    public $number;
    public function __construct($i, $initialValue, $number)
    {
        $this->i = $i;
        $this->initialValue = $initialValue;
        $this->number = $number;
    }


    public function factorialCalculation()
    {
       if($this->number > 0){
        while ($this->i <= $this->number) {
            $this->initialValue = $this->initialValue * $this->i;
            $this->i = $this->i + 1;
        }
        echo "the factorial number of  !$this->number is = $this->initialValue";
       }else {
        echo "Fatal ERROR the funtion just accept posivive numbers";
       };
    }
};


$firstValue = 1;
$secondValue = 1;
$num = $_REQUEST['number'];


$data  = new CalculateFactorial($firstValue, $secondValue, $num);
$data->factorialCalculation();