<?php

namespace App\Http\Controllers;

use App\Models\Mechanic;
use App\Models\Photo;
use App\Http\Requests\StoreMechanicRequest;
use App\Http\Requests\UpdateMechanicRequest;
use Illuminate\Http\Request;

class MechanicController extends Controller
{



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
        $s = $request->query('s', '');

        $mechanics = Mechanic::query();

        if ($s) {
            $keywords = explode(' ', $s);
            if (count($keywords) > 1) {
                $mechanics = $mechanics->where(function ($query) use ($keywords) {
                    foreach (range(0, 1) as $index) {
                        $query->orWhere('name', 'like', '%' . $keywords[$index] . '%')
                        ->where('surname', 'like', '%' . $keywords[1 - $index] . '%');
                    }
                });
            } else {
                $mechanics = $mechanics
                    ->where('name', 'like', "%{$s}%")
                    ->orWhere('surname', 'like', "%{$s}%");
            }
        }

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
            's' => $s,
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

        $mechanicId = Mechanic::create($request->all())->id;

        if ($request->photos) {
            foreach ($request->photos as $photo) {
                $originalName = $photo->getClientOriginalName();
                $namePrefix = time();
                $originalName = "{$namePrefix}-{$originalName}";
                $photo->move(public_path() . '/img/', $originalName);
                Photo::create([
                    'mechanic_id' => $mechanicId,
                    'path' => $originalName,
                ]);
            }
        }


        return redirect()->route('mechanics-index')->with('ok', 'Štai ir naujas mechanikas!');
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

        $mechanicPhotosIds = $mechanic->photos->pluck('id')->toArray();
        $photosIds = $request->photo_id ? $request->photo_id : [];
        $toDelete = array_diff($mechanicPhotosIds, $photosIds);
        $photoFilesIndexes = array_keys($request->photos ?? []);
        $photoIdsIndexes = array_keys($request->photo_id ?? []);
        $toOvewrite = array_intersect($photoFilesIndexes, $photoIdsIndexes);
        $newPhotos = array_diff($photoFilesIndexes, $photoIdsIndexes);

        if ($toDelete) {
            foreach ($toDelete as $photoId) {
                $photo = Photo::find($photoId);
                $photo->delete();
                $path = public_path() . '/img/' . $photo->path;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }
        if ($toOvewrite) {
            foreach ($toOvewrite as $index) {
                $photo = Photo::find($request->photo_id[$index]);
                $path = public_path() . '/img/' . $photo->path;
                if (file_exists($path)) {
                    unlink($path);
                }
                $originalName = $request->photos[$index]->getClientOriginalName();
                $namePrefix = time();
                $originalName = "{$namePrefix}-{$originalName}";
                $request->photos[$index]->move(public_path() . '/img/', $originalName);
                $photo->update([
                    'path' => $originalName,
                ]);
            }
        }
        if ($newPhotos) {
            foreach ($newPhotos as $index) {
                $originalName = $request->photos[$index]->getClientOriginalName();
                $namePrefix = time();
                $originalName = "{$namePrefix}-{$originalName}";
                $request->photos[$index]->move(public_path() . '/img/', $originalName);
                Photo::create([
                    'mechanic_id' => $mechanic->id,
                    'path' => $originalName,
                ]);
            }
        }

        return redirect()->route('mechanics-index')->with('ok', 'Mechaniko duomenys dabar jau pakeisti.');
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
        if ($mechanic->photos()->count()) {
            foreach($mechanic->photos as $photo) {
                $photo->delete();
                $path = public_path() . '/img/' . $photo->path;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $mechanic->delete();

        return redirect()->route('mechanics-index')->with('info', 'Liūdna informuoti, bet mechanikas atleistas iš darbo.');
    }
}
