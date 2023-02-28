<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostClassfield\PostClassfieldController;
use App\Http\Controllers\ListClassfield\ListClassfieldController;
use App\Http\Controllers\Home\HomeController;
Route::name('list.')->prefix('/')->group(function() {
    Route::get('/', [HomeController::class,'index'])->name("home.page");
    Route::post('/', [HomeController::class,'redirectSearch'])->name("home.search.redirect");
    Route::get('/ads/{catdId}/{state}/{slug}', [ListClassfieldController::class,'list'])->name('list.category.state');
});
?>