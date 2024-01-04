<?php


class Kibiras1 {
    
    private $akmenuKiekis = 0;

    public function prideti1Akmeni() {
        $this->akmenuKiekis++;
    }

    public function pridetiDaugAkmenu($kiekis) {
        if (!is_integer($kiekis)) {
            return;
        }
        if ($kiekis < 0) {
            return;
        }
        $this->akmenuKiekis += $kiekis;
    }

    public function kiekPririnktaAkmenu() {
        return $this->akmenuKiekis;
    }
}