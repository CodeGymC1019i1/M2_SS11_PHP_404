<?php


class NetworkOperator
{
    public $name;
    public $listHeadNumber = [];
    public $numbers = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addHeadNumber($headNumbers)
    {
        array_push($this->listHeadNumber, $headNumbers);
    }

    public function addNumbers($numbers)
    {
        array_push($this->numbers, $numbers);
    }
}