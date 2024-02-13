<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Mechanic;
use App\Models\MechanicTruck;
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

        $mechanics = Mechanic::orderBy('name')->get();

        $allBrands = Truck::select('brand')->distinct()->orderBy('brand')->get()->pluck('brand')->toArray();



        $sorts = Truck::getSorts();
        $sortBy = $request->query('sort', '');
        $perPageSelect = Truck::getPerPageSelect();
        $perPage = (int) $request->query('per_page', 0);
        $mechanicId = (int) $request->query('mechanic_id', 0);
        $brandId = $request->query('brand', '');

        $trucks = Truck::query();

        if ($mechanicId > 0) {
            $trucks = Mechanic::find($mechanicId)->trucks();
        }

        if ($brandId !== '') {
            $trucks = $trucks->where('brand', $brandId);
        }

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
            'mechanics' => $mechanics,
            'mechanicId' => $mechanicId,
            'brands' => $allBrands,
            'brandId' => $brandId,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $trucks = Mechanic::all();
        $mechanicId = (int) $request->query('mechanic_id', 0);

        return view('trucks.create', [
            'mechanics' => $trucks,
            'mechanicId' => $mechanicId,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTruckRequest $request)
    {
        $truckId = Truck::create($request->all())->id;

        if ($request->has('mechanic_id')) {
            $uniqueMechanics = array_unique($request->mechanic_id);
            foreach ($uniqueMechanics as $mechanicId) {
                if (Mechanic::find($mechanicId) !== null) {
                    MechanicTruck::create([
                        'truck_id' => $truckId,
                        'mechanic_id' => $mechanicId,
                    ]);
                }
            }
        }

        return redirect()->route('trucks-index')->with('ok', 'Sunkvežimis sėkmingai pridėtas.');
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
        $truckMechanics = $truck->mechanics->pluck('id')->toArray();

        return view('trucks.edit', [
            'truck' => $truck,
            'mechanics' => $mechanics,
            'truckMechanics' => $truckMechanics,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTruckRequest $request, Truck $truck)
    {
        $truck->update($request->all());

        $oldMechanics = $truck->mechanics->pluck('id')->toArray();
        $newMechanics = array_unique($request->mechanic_id ?? []);
        $toDelete = array_diff($oldMechanics, $newMechanics);
        $toAdd = array_diff($newMechanics, $oldMechanics);

        // dd($request->all());

        MechanicTruck::whereIn('mechanic_id', $toDelete)->where('truck_id', $truck->id)->delete();

        foreach ($toAdd as $mechanicId) {
            MechanicTruck::create([
                'truck_id' => $truck->id,
                'mechanic_id' => $mechanicId,
            ]);
        }

        return redirect()->route('trucks-index')->with('ok', 'Sunkvežimis sėkmingai atnaujintas.');
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

        return redirect()->route('trucks-index')->with('info', 'Sunkvežimis buvo išvežtas į metalo laužą.');
    }
}
