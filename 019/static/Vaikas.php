<?php


class Vaikas extends Tevas {

    static public $socialinisTinklas = 'TikTok';

    static public function kaSkrolinaVaikas() {

        echo 'Skrolinu ' . self::$socialinisTinklas . '<br>';

    }

}