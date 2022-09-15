<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RpsController;

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
        Route::get('/profile', [ProfileController::class, 'profile']);
        Route::put('/edit-password/{id}', [ProfileController::class, 'password']);
        Route::put('/edit-pp/{id}', [ProfileController::class, 'pp']);
        Route::put('/edit-name/{id}', [ProfileController::class, 'name']);

        Route::middleware('dosen')->prefix('dosen')->group(
            function () {
                Route::get('dashboard', function () {
                    return view('dosen.dashboard');
                })->name('dashboard');
                Route::get('cpl/add-cpl', function () {
                    return view('dosen.cpl.add');
                })->name('cpl-add');
                Route::get('rps/add-rps', function () {
                    return view('dosen.rps.add');
                })->name('rps-add');
                Route::get('cpmk/add-cpmk', function () {
                    return view('dosen.cpmk.add');
                })->name('cpmk-add');
                Route::get('cpmk/list-cpmk', function () {
                    return view('dosen.cpmk.list');
                })->name('cpmk-list');
                Route::get('rps/list-rps', function () {
                    return view('dosen.rps.list');
                })->name('rps-list');
                Route::get('cpl/list-cpl', function () {
                    return view('dosen.cpl.list');
                })->name('cpl-list');
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
                Route::put('/reset-dosen/{id}', [UserController::class, 'reset']);
                Route::delete('/delete-dosen/{id}', [UserController::class, 'delete']);
                Route::get('/edit-dosen/{id}', [UserController::class, 'edit']);
                Route::put('/edit-dosen/{id}', [UserController::class, 'update']);
                Route::get('/list-rps', [RpsController::class, 'list']);
                Route::get('/print-rps', function () {
                    return view('admin.rps.print');
                });
            }
        );
    }
);


require __DIR__ . '/auth.php';
