<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{SupportController};

Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/', function () {
    return view('welcome');
});
