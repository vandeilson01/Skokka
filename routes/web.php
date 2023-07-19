<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DropdownController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


 Route::get('/ads', function () {
    return view('ads.page');
});
Route::get('/ads/create', function () {
    return view('post.insert');
});

//user
Route::get('/dashboard', function () {
    return view('user.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); 

//publicar

Route::get('publicar', function () {
    return view('home.publicar');
});

//adm


Route::middleware('auth:admin')->group(function () {
    Route::get('admin/panel', function () {
        return view('adm.panel');
    })->middleware(['verified'])->name('adm.panel'); 

    Route::get('admin/acompanhantes', function () {
        return view('adm.acompanhantes');
    })->middleware(['verified'])->name('adm.panel'); 

    Route::get('admin/clientes', function () {
        return view('adm.clientes');
    })->middleware(['verified'])->name('adm.panel'); 

    Route::get('admin/categorias', function () {
        return view('adm.categorias');
    })->middleware(['verified'])->name('adm.panel'); 

    Route::get('admin/pagamentos', function () {
        return view('adm.pagamentos');
    })->middleware(['verified'])->name('adm.panel'); 

    Route::get('admin/config', function () {
        return view('adm.config');
    })->middleware(['verified'])->name('adm.config'); 
    
});

Route::post('fetch-cities', [DropdownController::class, 'fetchCity']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// adm

require __DIR__.'/auth.php';
require __DIR__.'/categorys.php';

require __DIR__.'/postclassfield.php';
require __DIR__.'/list.route.php';

