<?php
namespace Colors\App;

use Colors\App\Controllers\HomeController;

class App
{
    public static function run()
    {
        $server = $_SERVER['REQUEST_URI'];
        // $server = str_replace('/colors/public/', '', $server);
        $url = explode('/', $server);
        array_shift($url);
        return self::router($url);
    }


    private static function router($url)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ('GET' == $method && count($url) == 1 && $url[0] == '') {
            return (new HomeController)->index();
        }
        if ('GET' == $method && count($url) == 2 && $url[0] == 'home') {
            return (new HomeController)->color($url[1]);
        }


        return '<h1>404</h1>';
    }

    public static function view($view, $data = [])
    {
        extract($data);
        ob_start();
        require ROOT . 'views/top.php';
        require ROOT . "views/$view.php";
        require ROOT . 'views/bottom.php';
        $content = ob_get_clean();
        return $content;
    }
}