<?php

namespace Colors\App;

use App\DB\FileBase;


class Auth {

    private static $auth;
    private $login = false;
    private $user;


    public static function get() {
        return self::$auth ?? self::$auth = new self;
    }

    private function __construct() {
        if (isset($_SESSION['login']) && $_SESSION['login'] == 1) {
            $this->login = true;
            $this->user = $_SESSION['user'];
        }
    }

    public function getStatus() {
        if ($this->login) {
            return $this->user;
        }
        return false;
    }

    public function tryLoginUser($email, $password) {
        $writer = new FileBase('users');
        $users = $writer->showAll();
        foreach ($users as $user) {
            if ($user->email == $email && $user->password == sha1($password)) {
                $_SESSION['login'] = 1;
                $_SESSION['user'] = $user->name;
                return true;
            }
        }
        return false;
    }

    public function logout() {
        $_SESSION['login'] = 0;
        $_SESSION['user'] = '';
        return true;
    }


}