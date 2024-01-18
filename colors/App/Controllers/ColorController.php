<?php
namespace Colors\App\Controllers;

use Colors\App\App;
use App\DB\FileBase;
use App\DB\MariaBase;
use Colors\App\Message;

use Colors\App\Requests\ColorStoreRequest;

class ColorController {

    public function index($request) {

        $writer = match(DB) {
            'file' => new FileBase('colors'),
            'maria' => new MariaBase('colors'),
        };

        $colors = $writer->showAll();

        $sort = $request['sort'] ?? null;
        if ($sort == 'size-asc') {
            usort($colors, fn($a, $b) => $a->size <=> $b->size);
            $sortValue = 'size-desc'; 
        } elseif($sort == 'size-desc') {
            usort($colors, fn($a, $b) => $b->size <=> $a->size);
            $sortValue = 'size-asc'; 
        } else {
            $sortValue = 'size-asc'; 
        }

        return App::view('colors/index', [
            'title' => 'All colors',
            'colors' => $colors,
            'sortValue' => $sortValue
        ]);
    }
    
    
    public function create() {

        return App::view('colors/create', [
            'title' => 'Create new color'
        ]);
    }

    public function store($request) {

        if (!ColorStoreRequest::validate($request)) {
            return App::redirect('colors/create');
        }

        $color = $request['color'] ?? null;
        $size = $request['size'] ?? null;

        $colorTrim = ltrim($color, '#');

        // curl to color API here
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://www.thecolorapi.com/id?hex=$colorTrim",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
        ]);

        $response = curl_exec($curl);// atsakymas gali trukti iki 30 sekundziu

        if (false === $response) {
            echo 'Curl error: ' . curl_error($ch);
            die;
        }
        else {
            $response = json_decode($response);
            $colorName = $response->name->value;
        }

        curl_close($curl);

        $writer = match(DB) {
            'file' => new FileBase('colors'),
            'maria' => new MariaBase('colors'),
        };

        $writer->create((object) [
            'color' => $color,
            'size' => $size,
            'name' => $colorName ?? 'unknown'
        ]);

        Message::get()->set('success', 'Color was created');

        return App::redirect('colors');

    }

    public function destroy($id) {

        $writer = match(DB) {
            'file' => new FileBase('colors'),
            'maria' => new MariaBase('colors'),
        };

        $writer->delete($id);

        Message::get()->set('info', 'Color was deleted');

        return App::redirect('colors');
    }

    public function edit($id) {

        $writer = match(DB) {
            'file' => new FileBase('colors'),
            'maria' => new MariaBase('colors'),
        };

        $color = $writer->show($id);

        return App::view('colors/edit', [
            'title' => 'Edit color',
            'color' => $color
        ]);
    }

    public function update($id, $request) {

        $color = $request['color'] ?? null;
        $size = $request['size'] ?? null;

        $colorTrim = ltrim($color, '#');

        // curl to color API here
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "https://www.thecolorapi.com/id?hex=$colorTrim",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
        ]);

        $response = curl_exec($curl);// atsakymas gali trukti iki 30 sekundziu

        if (false === $response) {
            echo 'Curl error: ' . curl_error($ch);
            die;
        }
        else {
            $response = json_decode($response);
            $colorName = $response->name->value;
        }

        curl_close($curl);

        $writer = match(DB) {
            'file' => new FileBase('colors'),
            'maria' => new MariaBase('colors'),
        };

        $writer->update($id, (object) [
            'color' => $color,
            'size' => $size,
            'name' => $colorName ?? 'unknown'
        ]);

        Message::get()->set('success', 'Color was updated');

        return App::redirect('colors');
    }

}