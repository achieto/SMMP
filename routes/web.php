<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RpsController;
use App\Http\Controllers\MkController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\DashboardController;

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
        Route::get('/', function () {
            return view('dashboard');
        })->middleware(['other']);
        Route::middleware('dosen')->prefix('dosen')->group(
            function () {
                Route::get('dashboard', function () {
                    return view('dosen.dashboard');
                })->name('dashboard');
                Route::get('cplmk/add-cplmk', [DosenController::class, 'cplmkAdd'])->name('cplmk-add');
                Route::post('cplmk/add-cplmk', [DosenController::class, 'cplmkStore'])->name('cplmk-store');
                Route::get('cplmk/list-cplmk', [DosenController::class, 'cplmkList'])->name('cplmk-list');
                Route::delete('cplmk/delete-cplmk/{id}', [DosenController::class, 'cplmkDelete'])->name('cplmk-delete');;
                Route::get('rps/add-rps', [DosenController::class, 'rpsAdd'])->name('rps-add');
                Route::post('rps/add-rps', [DosenController::class, 'rpsStore']);
                Route::get('rps/list-rps', [DosenController::class, 'rpsList'])->name('rps-list');
                Route::get('rps/print-rps/{id}', [DosenController::class, 'printRPS']);
                Route::get('rps/edit-rps/{id}', [DosenController::class, 'rpsEdit']);
                Route::put('rps/edit-rps/{id}', [DosenController::class, 'rpsUpdate']);
                Route::delete('rps/delete-rps/{id}', [DosenController::class, 'rpsDelete']);
                Route::get('cpmk/add-cpmk', function () {
                    return view('dosen.cpmk.add');
                })->name('cpmk-add');
                Route::get('cpmk/list-cpmk', function () {
                    return view('dosen.cpmk.list');
                })->name('cpmk-list');
            }
        );
        Route::middleware('admin')->prefix('admin')->group(
            function () {
                Route::get('dashboard', [DashboardController::class, 'index'])->name('admin');
                Route::get('dashboard-chart', [DashboardController::class, 'chart'])->name('chart');
                Route::get('add-dosen', [UserController::class, 'create'])
                    ->name('add-dosen');
                Route::post('add-dosen', [UserController::class, 'store']);
                Route::get('list-dosen', [UserController::class, 'list']);
                Route::put('reset-dosen/{id}', [UserController::class, 'reset']);
                Route::delete('delete-dosen/{id}', [UserController::class, 'delete']);
                Route::get('edit-dosen/{id}', [UserController::class, 'edit']);
                Route::put('edit-dosen/{id}', [UserController::class, 'update']);
                Route::get('list-rps', [RpsController::class, 'list']);
                Route::post('add-dosen-wfile', [UserController::class, 'create_wfile']);
                Route::get('print-rps/{id}', [RpsController::class, 'print']);
                Route::get('add-mk', [MkController::class, 'create']);
                Route::post('add-mk', [MkController::class, 'store']);
                Route::get('list-mk', [MkController::class, 'list']);
                Route::get('edit-mk/{id}', [MkController::class, 'edit']);
                Route::put('edit-mk/{id}', [MkController::class, 'update']);
                Route::delete('delete-mk/{id}', [MkController::class, 'delete']);
                Route::get('add-cpl', [CplController::class, 'create']);
                Route::post('add-cpl', [CplController::class, 'store']);
                Route::get('list-cpl', [CplController::class, 'list']);
                Route::get('edit-cpl/{id}', [CplController::class, 'edit']);
                Route::put('edit-cpl/{id}', [CplController::class, 'update']);
                Route::delete('delete-cpl/{id}', [CplController::class, 'delete']);
                Route::get('print-soal', function () {
                    return view('admin.soal.print');
                });
            }
        );
        Route::middleware('penjamin-mutu')->prefix('penjamin-mutu')->group(
            function () {
                Route::get('dashboard', function () {
                    return view('penjamin-mutu.dashboard');
                })->name('home');
            }
        );
    }
);


require __DIR__ . '/auth.php';
