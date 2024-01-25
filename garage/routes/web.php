<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MechanicController AS M;

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
    Route::get('/', [M::class, 'index'])->name('index');
    Route::get('/create', [M::class, 'create'])->name('create');
    Route::post('/', [M::class, 'store'])->name('store');
    Route::get('/{mechanic}', [M::class, 'show'])->name('show');
    Route::get('/{mechanic}/edit', [M::class, 'edit'])->name('edit');
    Route::put('/{mechanic}', [M::class, 'update'])->name('update');
    Route::get('/{mechanic}/delete', [M::class, 'delete'])->name('delete');
    Route::delete('/{mechanic}', [M::class, 'destroy'])->name('destroy');
});

// Authentication Routes






Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
