<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostClassfield\PostClassfieldController;
Route::name('post.')->prefix('post')->group(function() {
    Route::get('/create', [PostClassfieldController::class,'viewForm'])->name('info');
    Route::post('/create', [PostClassfieldController::class,'postInitialForm'])->name('info.create');
    Route::get('/{id}/{slug}/photos', [PostClassfieldController::class,'viewFormPhotos'])->name('photos');
    Route::post('/{id}/{slug}/photos', [PostClassfieldController::class,'viewFormPhotos'])->name('photos.create');
    Route::get('/{id}/{slug}/visibility', [PostClassfieldController::class,'viewFormVissibily'])->name('visibility');
    Route::post('/{id}/{slug}/visibility', [PostClassfieldController::class,'viewFormVissibily'])->name('visibility.create');
});

?>