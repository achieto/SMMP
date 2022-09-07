<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::middleware(['auth'])->group(
    function () {
        Route::middleware('dosen')->group(
            function () {
                Route::get('/dashboard', function () {
                    return view('dosen.dashboard');
                })->name('dashboard');
            }
        );
        Route::middleware('admin')->group(
            function () {
                Route::get('/', function () {
                    return view('admin.dashboard');
                })->name('admin');
                Route::get('/admin', function () {
                    return view('admin.dashboard');
                })->name('admin')->middleware(['auth']);
                Route::get('/add-dosen', [UserController::class, 'create'])
                    ->name('add-dosen');
                Route::post('add-dosen', [UserController::class, 'store']);
                Route::get('/list-dosen', [UserController::class, 'list']);
            }
        );
    }
);


require __DIR__ . '/auth.php';
