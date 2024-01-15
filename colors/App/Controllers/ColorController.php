<?php
namespace Colors\App\Controllers;

use Colors\App\App;
use App\DB\FileBase;

class ColorController {

    public function index() {

        $writer = new FileBase('colors');
        $colors = $writer->showAll();

        return App::view('colors/index', [
            'title' => 'All colors',
            'colors' => $colors
        ]);
    }
    
    
    public function create() {

        return App::view('colors/create', [
            'title' => 'Create new color'
        ]);
    }

    public function store($request) {

        $color = $request['color'] ?? null;
        $size = $request['size'] ?? null;

        $writer = new FileBase('colors');
        $writer->create((object) [
            'color' => $color,
            'size' => $size
        ]);

        return App::redirect('colors');

    }

}