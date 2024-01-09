<?php


class ColorDigit implements RandomColorInterface, RandomDigitInterface {

    public function randomColor() : string {
        $randomIndex = rand(0, count($this->randomColorsArray()) - 1);
        return $this->randomColorsArray()[$randomIndex];
    }

    public function randomColorsArray() : array {
        return ['red', 'green', 'blue', 'yellow', 'orange', 'purple', 'pink', 'brown', 'black', 'white'];
    }

    public function randomDigit() : int {
        return rand(0, 9);
    }

    public function print() : void {
        for ($i = 0; $i < 10; $i++) {
            echo '<div style="color: ' . $this->randomColor() . '">' . $this->randomDigit() . '</div>';
        }
    }

}