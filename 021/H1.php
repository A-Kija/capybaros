<?php


abstract class H1 {

    abstract public function randomColor() : string;

    public function text2H1($text) {
        return '<h1 style="color:'.$this->randomColor().';">'.$text.'</h1>';
    }

}