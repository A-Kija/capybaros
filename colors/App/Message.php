<?php

namespace Colors\App;

class Message {

    private static $message;
    private $show, $error = false;

    public static function get() {
        return self::$message ?? self::$message = new self;
    }

    private function __construct() {
        if (isset($_SESSION['message'])) {
            $this->show = $_SESSION['message'];
            unset($_SESSION['message']);
        }
    }

    public function show() {
        return $this->show ?? false;
    }

    public function set($type, $message) {
        $this->error = true;
        $_SESSION['message'] = [
            'text' => $message,
            'type' => $type
        ];
    }

    public function hasErrors() {
        return $this->error;
    }

}