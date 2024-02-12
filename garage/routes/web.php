<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MechanicController AS M;
use App\Http\Controllers\TruckController AS T;
use App\Http\Controllers\CompanyController AS C;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Mechanics CRUD Group
Route::prefix('mechanics')->name('mechanics-')->group(function () {
    Route::get('/', [M::class, 'index'])->middleware(['role:admin|animal|user'])->name('index');
    Route::get('/create', [M::class, 'create'])->middleware(['role:admin|animal'])->name('create');
    Route::post('/', [M::class, 'store'])->middleware(['role:admin|animal'])->name('store');
    Route::get('/{mechanic}', [M::class, 'show'])->middleware(['role:admin|animal|user'])->name('show');
    Route::get('/{mechanic}/edit', [M::class, 'edit'])->middleware(['role:admin'])->name('edit');
    Route::put('/{mechanic}', [M::class, 'update'])->middleware(['role:admin'])->name('update');
    Route::get('/{mechanic}/delete', [M::class, 'delete'])->middleware(['role:admin'])->name('delete');
    Route::delete('/{mechanic}', [M::class, 'destroy'])->middleware(['role:admin'])->name('destroy');
});

// Trucks CRUD Group
Route::prefix('trucks')->name('trucks-')->group(function () {
    Route::get('/', [T::class, 'index'])->name('index');
    Route::get('/create', [T::class, 'create'])->name('create');
    Route::post('/', [T::class, 'store'])->name('store');
    Route::get('/{truck}', [T::class, 'show'])->name('show');
    Route::get('/{truck}/edit', [T::class, 'edit'])->name('edit');
    Route::put('/{truck}', [T::class, 'update'])->name('update');
    Route::get('/{truck}/delete', [T::class, 'delete'])->name('delete');
    Route::delete('/{truck}', [T::class, 'destroy'])->name('destroy');
});


// Companies CRUD Group
Route::prefix('companies')->name('companies-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::post('/', [C::class, 'store'])->name('store');
    Route::get('/list', [C::class, 'list'])->name('list');
    Route::get('/{company}/delete', [C::class, 'delete'])->name('delete');
    Route::delete('/{company}', [C::class, 'destroy'])->name('destroy');
    Route::get('/{company}/edit', [C::class, 'edit'])->name('edit');
    Route::put('/{company}', [C::class, 'update'])->name('update');
    Route::get('/{company}', [C::class, 'show'])->name('show');
});

// Authentication Routes






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
