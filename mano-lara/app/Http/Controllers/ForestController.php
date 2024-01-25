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

    public function showCount()
    {
        // $result = session('result', 0);
        $result = session()->get('result', '');
        //pull
        // $result = session()->pull('result', '');
        
        return view('counter.count', [
            'result' => $result
        ]);
    }

    public function count(Request $request)
    {
        $count1 = $request->count1;
        $count2 = $request->count2;

        $result = $count1 + $count2;

        // session(['result' => $result]);
        // session()->put('result', $result);
        // session()->flash('result', $result);
        // $request->session()->flash('result', $result);

        return redirect()->route('count')->with('result', $result);

    }

    public function showSquares()
    {
        $count = session()->get('squares', 0);
        $squares = $count ? range(1, $count) : [];

        return view('sq.show', [
            'count' => $count,
            'squares' => $squares
        ]);
    }

    public function squares(Request $request)
    {
        $count = $request->count ?? 0;

        session()->put('squares', $count);

        return redirect()->route('squares');
    }

    public function addSquares(Request $request)
    {
        $count = $request->count ?? 0;
        $was = session()->get('squares', 0);
        $count += $was;

        session()->put('squares', $count);

        return redirect()->route('squares');
    }
}
