<?php
namespace Colors\App\Controllers;

use Colors\App\App;

class ColorController {


    public function create() {

        return App::view('colors/create', [
            'title' => 'Create new color'
        ]);
    }

    public function store($request) {

        $color = $request['color'] ?? null;
        $size = $request['size'] ?? null;


    }

}