<?php


class Tevas {

    static public $socialinisTinklas = 'Facebook';

    static public function kaSkrolinaTevukas() {

        echo 'Skrolinu ' . self::$socialinisTinklas . '<br>';
        echo 'Skrolinu ' . static::$socialinisTinklas . '<br>';

    }

}