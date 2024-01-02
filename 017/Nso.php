<?php

class Nso {

    public $speed = 'fast'; 
    protected $color;
    private $weight = 'heavy';

    public $number;


    public function __construct($number, $color = 'red') {
        $this->number = $number;
        $this->color = $color;
        echo 'I am a Nso <br>';
        $this->goSwim();
    }



    public function goFly() {
        echo 'I am flying ' . $this->speed . ' <br>';
        echo 'My color is ' . $this->color . ' <br>';
        $this->goSwim();
    }

    private function goSwim() {
        echo 'I am swimming <br>';
    }

    public function changeColor($color) {

        echo 'My color was ' . $this->color . '<br>';
        echo 'Change to ' . $color . '<br>';
        $this->color = $color;

        
    }


}
