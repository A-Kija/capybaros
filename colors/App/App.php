<?php
namespace Colors\App;

use Colors\App\Controllers\HomeController;
use Colors\App\Controllers\ColorController;

class App
{
    public static function run()
    {
        $server = $_SERVER['REQUEST_URI'];
        // $server = str_replace('/colors/public/', '', $server);

        $server = preg_replace('/\?.*$/', '', $server);
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


        if ('GET' == $method && count($url) == 1 && $url[0] == 'colors') {
            return (new ColorController)->index($_GET);
        }


        if ('GET' == $method && count($url) == 2 && $url[0] == 'colors' && $url[1] == 'create') {
            return (new ColorController)->create();
        }

        if ('POST' == $method && count($url) == 2 && $url[0] == 'colors' && $url[1] == 'store') {
            return (new ColorController)->store($_POST);
        }

        if ('POST' == $method && count($url) == 3 && $url[0] == 'colors' && $url[1] == 'destroy') {
            return (new ColorController)->destroy($url[2]);
        }

        if ('GET' == $method && count($url) == 3 && $url[0] == 'colors' && $url[1] == 'edit') {
            return (new ColorController)->edit($url[2]);
        }

        if ('POST' == $method && count($url) == 3 && $url[0] == 'colors' && $url[1] == 'update') {
            return (new ColorController)->update($url[2], $_POST);
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

    public static function redirect($url)
    {
        header('Location: '.URL.'/'.$url);
        return null;
    }
}