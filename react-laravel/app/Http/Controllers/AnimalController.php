<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function indexBlade(Request $request)
    {
        return view('animal', [
            'color' => $request->color ?? 'skyblue',
        ]);
    }

    public function indexReact(Request $request)
    {
        return inertia('Animal', [
            'color' => $request->color ?? 'skyblue',
        ]);
    }
}
