<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Http\Requests\StoreMechanicRequest;
use App\Http\Requests\UpdateMechanicRequest;
use Illuminate\Http\Request;

class MechanicController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $mechanics = Mechanic::all()->sortByDesc('surname'); in collection
        
        $sorts = Mechanic::getSorts();
        $sortBy = $request->query('sort', '');
        $perPageSelect = Mechanic::getPerPageSelect();
        $perPage = (int) $request->query('per_page', 0);

        $mechanics = Mechanic::query();

        $mechanics = match($sortBy) {
            'name_asc' => $mechanics->orderBy('surname'),
            'name_desc' => $mechanics->orderByDesc('surname'),
            'truck_count_asc' => $mechanics->withCount('trucks')->orderBy('trucks_count'),
            'truck_count_desc' => $mechanics->withCount('trucks')->orderByDesc('trucks_count'),
            default => $mechanics
        };

        if ($perPage > 0) {
            $mechanics = $mechanics->paginate($perPage)->withQueryString();
        } else {
            $mechanics = $mechanics->get();
        }

        return view('mechanics.index', [
            'mechanics' => $mechanics,
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
        return view('mechanics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMechanicRequest $request)
    {
        Mechanic::create($request->all());

        return redirect()->route('mechanics-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mechanic $mechanic)
    {
        return view('mechanics.show', [
            'mechanic' => $mechanic,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mechanic $mechanic)
    {
        return view('mechanics.edit', [
            'mechanic' => $mechanic,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMechanicRequest $request, Mechanic $mechanic)
    {
        $mechanic->update($request->all());

        return redirect()->route('mechanics-index');
    }

    /**
     * Confirm remove the specified resource from storage.
     */

    public function delete(Mechanic $mechanic) 
    {
        return view('mechanics.delete', [
            'mechanic' => $mechanic,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mechanic $mechanic)
    {
        $mechanic->delete();

        return redirect()->route('mechanics-index');
    }
}
