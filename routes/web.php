<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/dashboard', function () {
    return view('dosen.CPL.add');
})->name('dashboard')->middleware(['auth'])->middleware(['dosen']);

Route::middleware('admin')->group(
    function () {
        Route::get('/admin', function () {
            return view('admin.user.list');
        })->name('admin')->middleware(['auth']);
        Route::get('/add-dosen', [RegisteredUserController::class, 'create'])
            ->name('add-dosen');
        Route::post('add-dosen', [RegisteredUserController::class, 'store']);
    }
);

require __DIR__ . '/auth.php';
