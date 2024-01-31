<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Mechanic;
use App\Http\Requests\StoreTruckRequest;
use App\Http\Requests\UpdateTruckRequest;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // eksperimentas
        // $truck = Truck::where('mechanic_id', 1)->first();
        // dump($truck->mechanic);
        // dd($truck->mechanic());
        
        $sorts = Truck::getSorts();
        $sortBy = $request->query('sort', '');
        $perPageSelect = Truck::getPerPageSelect();
        $perPage = (int) $request->query('per_page', 0);

        $trucks = Truck::query();

        $trucks = match($sortBy) {
            'model_asc' => $trucks->orderBy('brand'),
            'model_desc' => $trucks->orderByDesc('brand'),
            default => $trucks
        };

        if ($perPage > 0) {
            $trucks = $trucks->paginate($perPage)->withQueryString();
        } else {
            $trucks = $trucks->get();
        }

        return view('trucks.index', [
            'trucks' => $trucks,
            'sorts' => $sorts,
            'sortBy' => $sortBy,
            'perPageSelect' => $perPageSelect,
            'perPage' => $perPage,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trucks = Mechanic::all();

        return view('trucks.create', [
            'mechanics' => $trucks,
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
        $trucks = Mechanic::all();
        
        return view('trucks.edit', [
            'truck' => $truck,
            'mechanics' => $trucks,
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
