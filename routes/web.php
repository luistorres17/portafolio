<?php
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [ProjectController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class);
    Route::get('/info', function () {
        return view('info');
    })->name('info');
    Route::resource('infos', InfoController::class);
    Route::post('/infos', [InfoController::class, 'store'])->name('infos.store');
    Route::get('/info', [InfoController::class, 'index'])->name('info.index');
});




require __DIR__.'/auth.php';
