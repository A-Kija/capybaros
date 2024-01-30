<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Mechanic;
use App\Http\Requests\StoreTruckRequest;
use App\Http\Requests\UpdateTruckRequest;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // eksperimentas
        // $truck = Truck::where('mechanic_id', 1)->first();
        // dump($truck->mechanic);
        // dd($truck->mechanic());
        
        
        $trucks = Truck::all();

        return view('trucks.index', [
            'trucks' => $trucks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mechanics = Mechanic::all();

        return view('trucks.create', [
            'mechanics' => $mechanics,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTruckRequest $request)
    {
        Truck::create($request->all());

        return redirect()->route('trucks-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Truck $truck)
    {
        return view('trucks.show', [
            'truck' => $truck,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        $mechanics = Mechanic::all();
        
        return view('trucks.edit', [
            'truck' => $truck,
            'mechanics' => $mechanics,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTruckRequest $request, Truck $truck)
    {
        $truck->update($request->all());

        return redirect()->route('trucks-index');
    }

    /**
     * Confirm remove the specified resource from storage.
     */
    public function delete(Truck $truck)
    {
        return view('trucks.delete', [
            'truck' => $truck,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();

        return redirect()->route('trucks-index');
    }
}
