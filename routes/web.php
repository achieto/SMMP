<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RpsController;
use App\Http\Controllers\MkController;
use App\Http\Controllers\CplController;
use App\Http\Controllers\Dosen\RPScontroller as RPSdosen;
use App\Http\Controllers\Dosen\CPMKcontroller as CPMKdosen;
use App\Http\Controllers\Dosen\CPLMKcontroller as CPLMKdosen;
use App\Http\Controllers\Dosen\DashboardController as DashboardDosen;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dosen\ActivitiesController;

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
                Route::get('dashboard', [DashboardDosen::class, 'list'] )->name('dashboard');
                Route::get('dashboard-chart', [DashboardDosen::class, 'chart'])->name('dosen-chart');
                Route::get('activities/add-activity', [ActivitiesController::class, 'Add'])->name('activities-add');
                Route::get('cplmk/add-cplmk', [CPLMKdosen::class, 'Add'])->name('cplmk-add');
                Route::post('cplmk/add-cplmk', [CPLMKdosen::class, 'Store'])->name('cplmk-store');
                Route::get('cplmk/list-cplmk', [CPLMKdosen::class, 'List'])->name('cplmk-list');
                Route::delete('cplmk/delete-cplmk/{id}', [CPLMKdosen::class, 'Delete'])->name('cplmk-delete');
                Route::get('rps/add-rps', [RPSdosen::class, 'Add'])->name('rps-add');
                Route::post('rps/add-rps', [RPSdosen::class, 'Store']);
                Route::get('rps/list-rps', [RPSdosen::class, 'List'])->name('rps-list');
                Route::get('rps/print-rps/{id}', [RPSdosen::class, 'Print']);
                Route::get('rps/edit-rps/{id}', [RPSdosen::class, 'Edit']);
                Route::put('rps/edit-rps/{id}', [RPSdosen::class, 'Update']);
                Route::delete('rps/delete-rps/{id}', [RPSdosen::class, 'Delete']);
                Route::get('cpmk/add-cpmk', [CPMKdosen::class, 'Add'])->name('cpmk-add');
                Route::post('cpmk/add-cpmk', [CPMKdosen::class, 'Store'])->name('cpmk-store');
                Route::get('cpmk/edit-cpmk/{id}', [CPMKdosen::class, 'Edit'])->name('cpmk-edit');
                Route::put('cpmk/edit-cpmk/{id}', [CPMKdosen::class, 'Update']);
                Route::get('cpmk/list-cpmk', [CPMKdosen::class, 'List'])->name('cpmk-list');
                Route::delete('cpmk/delete-cpmk/{id}', [CPMKdosen::class, 'Delete'])->name('cpmk-delete');
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
