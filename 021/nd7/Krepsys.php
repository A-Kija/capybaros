<?php

class Krepsys {
    private $svoris = 0;
    const DYDIS = 500;

    public function deti(Grybas $grybas) : bool {
        if ($grybas->valgomas && !$grybas->sukirmijes) {
            $this->svoris += $grybas->svoris;
        }
        return self::DYDIS >= $this->svoris;
    }

}