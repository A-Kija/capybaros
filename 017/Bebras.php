<?php

class Bebras {

    public $spalva = 'ruda';
    private $svoris = 'nezinomas'; // dar nepasverem
    private $ugis = 1.0; // metrais



    public function __construct() {
        echo '<br>Bebras atėjo<br>';
    }

    public function __destruct() {
        echo '<br>Bebras išėjo<br>';
    }

    public function __toString(): string {
        return "<br>Bebras spalvos: $this->spalva, ugis: $this->ugis, svoris: $this->svoris<br>";
    }

    public function __invoke() {
        echo '<br>Bebras sako:<br>';
        echo 'Labas<br>';
    }

    public function __serialize(): array {
        return [
            'ugis' => $this->ugis,
            'svoris' => $this->svoris
        ];
    }

    public function __unserialize(array $data): void {
        $this->ugis = $data['ugis'] * 2;
        $this->svoris = $data['svoris'];
    }

    public function __get($prop) {

        return match($prop) {
            'ugis' => $this->ugis . ' metrai',
            'svoris' => $this->svoris . ' kg',
            'uodega' => $this->kokiaUodega(),
            default => null
        };
        
    }

    public function __set($prop, $val) {

        if ($prop == 'ugis') {
            if ($val < 0.8 || $val > 1.0) {
                echo 'Blogai ivestas ugis';
                return;
            }
            $this->ugis = $val;
        }
        // if ($prop == 'svoris') {
        //     if ($val < 5 || $val > 45) {
        //         echo 'Blogai ivestas svoris';
        //         return;
        //     }
        //     $this->svoris = $val;
        // }
    }

    private function kokiaUodega() {
        return 'uodega: ' . rand(20, 30) . ' cm';
    }

    // getter'is
    public function koksSvoris() {
        return $this->svoris;
    }

    // setter'is
    public function duotiMaisto($kg) {
        if ($kg > 5) {
            echo 'Per daug <br>';
            return;
        }
        if ($kg < 0.1) {
            echo 'Per mazai <br>';
            return;
        }
        if ($kg + $this->svoris > 45) {
            echo 'Bebras jau storas <br>';
            return;
        }
        echo 'Bebras pašertas <br>';
        $this->svoris = $this->svoris + $kg;
    }

    public function pasverti() {
        $this->svoris = rand(5, 45);
    }

}