<?php


class Pinigine {
        
        private $popieriniaiPinigai;
        private $metaliniaiPinigai;

        public function __construct() {
            $this->popieriniaiPinigai = 0;
            $this->metaliniaiPinigai = 0;
        }
        
        public function ideti($kiekis) {
            if (!is_integer($kiekis)) {
                return;
            }
            if ($kiekis < 0) {
                return;
            }
            if ($kiekis >= 2) {
                $this->popieriniaiPinigai += $kiekis;
            } else {
                $this->metaliniaiPinigai += $kiekis;
            }
        }
        
        public function skaiciuoti() {
            echo ($this->popieriniaiPinigai + $this->metaliniaiPinigai) . '<br>';
        }
        

}