<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Http\Requests\StoreColorRequest;
use App\Http\Requests\UpdateColorRequest;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::all();
        return inertia('Color/Index', [
            'colors' => $colors,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColorRequest $request)
    {
        sleep(3);
        abort(403, 'Unauthorized action.');
        $id = Color::create($request->validated())->id;
        return response()->json([
            'message' => 'Success',
            'id' => $id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColorRequest $request, Color $color)
    {
        sleep(3);
        $color->update($request->validated());
        return response()->json([
            'message' => 'Success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        
        sleep(3);
        // abort(403, 'Unauthorized action.');
        $color->delete();
        return response()->json([
            'message' => 'Success',
        ]);
    }
}
