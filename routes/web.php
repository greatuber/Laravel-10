<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SupportController};

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
Route::post('/supports/create', [SupportController::class, 'store'])->name('supports.store');

Route::get('/', function () {
    return view('welcome');
});
