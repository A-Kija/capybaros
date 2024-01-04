<?php


class Cart {

    private static $cartObject;


    public static function getCart() {
        return self::$cartObject ?? self::$cartObject = new self;
    }

    private function __construct() {
        // ...
    }

    private function __clone() {
        // ...
    }

    // private function __serialize() {
    //     // ...
    // }

}