<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForestController extends Controller
{
    public function labas(Request $request, $color1, $size)
    {
        return view('bebras', [
            'color' => $color1,
            'size' => $size,
            'word' => $request->a
        ]);
    }
}
