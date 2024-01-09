<?php

class RandomColor extends H1 {

    private $colors = ['skyblue', 'crimson', 'lightgreen'];

    public function randomColor() : string
    {
        return $this->colors[rand(0, count($this->colors) - 1)];
    }
}