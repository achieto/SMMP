<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RpsController;
use App\Http\Controllers\Admin\MkController;
use App\Http\Controllers\Admin\CpmkController;
use App\Http\Controllers\Admin\CplController;
use App\Http\Controllers\Admin\CplmkController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KurikulumController;
use App\Http\Controllers\Admin\SoalController;
use App\Http\Controllers\Dosen\RPScontroller as RPSdosen;
use App\Http\Controllers\Dosen\CPMKcontroller as CPMKdosen;
use App\Http\Controllers\Dosen\CPLMKcontroller as CPLMKdosen;
use App\Http\Controllers\Dosen\DashboardController as DashboardDosen;
use App\Http\Controllers\Dosen\ActivitiesController;
use App\Http\Controllers\PenjaminMutu\SoalController as SoalPM;
use App\Http\Controllers\ProfileController;
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
        // profile
        Route::get('/profile', [ProfileController::class, 'profile']);
        Route::put('/edit-password/{id}', [ProfileController::class, 'password']);
        Route::put('/edit-pp/{id}', [ProfileController::class, 'pp']);
        Route::put('/edit-name/{id}', [ProfileController::class, 'name']);

        // session handling
        Route::get('/', function () {
            return view('dashboard');
        })->middleware(['other']);

        // dosen
        Route::middleware('dosen')->prefix('dosen')->group(
            function () {
                Route::get('dashboard', [DashboardDosen::class, 'list'] )->name('dashboard');
                Route::get('dashboard-chart', [DashboardDosen::class, 'chart'])->name('dosen-chart');
                Route::get('activities/add-activity', [ActivitiesController::class, 'Add'])->name('activities-add');
                Route::post('activities/add-activity', [ActivitiesController::class, 'Store'])->name('activities-store');
                Route::get('activities/list-activity', [ActivitiesController::class, 'List'])->name('activities-list');
                Route::get('activities/edit-activity/{id}', [ActivitiesController::class, 'Edit'])->name('activity-edit');
                Route::put('activities/edit-activity/{id}', [ActivitiesController::class, 'Update'])->name('activity-update');
                Route::delete('activities/delete-activity/{id}', [ActivitiesController::class, 'Delete'])->name('activity-delete');
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

        // admin
        Route::middleware('admin')->prefix('admin')->group(
            function () {
                // dashboard
                Route::get('dashboard', [DashboardController::class, 'index'])->name('admin');
                Route::get('dashboard-chart/{id}', [DashboardController::class, 'chart'])->name('chart');
                Route::get('dashboard-card/{id}', [DashboardController::class, 'card'])->name('card');
                // user
                Route::get('add-user', [UserController::class, 'create'])
                    ->name('add-user');
                Route::post('add-user', [UserController::class, 'store']);
                Route::get('list-user', [UserController::class, 'list']);
                Route::put('reset-user/{id}', [UserController::class, 'reset']);
                Route::delete('delete-user/{id}', [UserController::class, 'delete']);
                Route::get('edit-user/{id}', [UserController::class, 'edit']);
                Route::put('edit-user/{id}', [UserController::class, 'update']);
                Route::post('add-user-wfile', [UserController::class, 'create_wfile']);
                // rps
                Route::get('add-rps', [RpsController::class, 'create']);
                Route::post('add-rps', [RpsController::class, 'store']);
                Route::get('edit-rps/{id}', [RpsController::class, 'edit']);
                Route::put('edit-rps/{id}', [RpsController::class, 'update']);
                Route::delete('delete-rps/{id}', [RpsController::class, 'delete']);
                Route::get('list-rps', [RpsController::class, 'list']);
                Route::get('print-rps/{id}', [RpsController::class, 'print']);
                Route::post('add-rps-wfile', [RpsController::class, 'create_wfile']);
                // mk
                Route::get('add-mk', [MkController::class, 'create']);
                Route::post('add-mk', [MkController::class, 'store']);
                Route::get('list-mk', [MkController::class, 'list']);
                Route::get('edit-mk/{id}', [MkController::class, 'edit']);
                Route::put('edit-mk/{id}', [MkController::class, 'update']);
                Route::delete('delete-mk/{id}', [MkController::class, 'delete']);
                // cpmk
                Route::get('add-cpmk', [CpmkController::class, 'create']);
                Route::post('add-cpmk', [CpmkController::class, 'store']);
                Route::get('list-cpmk', [CpmkController::class, 'list']);
                Route::get('edit-cpmk/{id}', [CpmkController::class, 'edit']);
                Route::put('edit-cpmk/{id}', [CpmkController::class, 'update']);
                Route::delete('delete-cpmk/{id}', [CpmkController::class, 'delete']);
                // cpl
                Route::get('add-cpl', [CplController::class, 'create']);
                Route::post('add-cpl', [CplController::class, 'store']);
                Route::get('list-cpl', [CplController::class, 'list']);
                Route::get('edit-cpl/{id}', [CplController::class, 'edit']);
                Route::put('edit-cpl/{id}', [CplController::class, 'update']);
                Route::delete('delete-cpl/{id}', [CplController::class, 'delete']);
                // cplmk
                Route::get('add-cplmk', [CplmkController::class, 'create']);
                Route::post('add-cplmk', [CplmkController::class, 'store']);
                Route::get('list-cplmk', [CplmkController::class, 'list']);
                Route::get('edit-cplmk/{id}', [CplmkController::class, 'edit']);
                Route::put('edit-cplmk/{id}', [CplmkController::class, 'update']);
                Route::delete('delete-cplmk/{id}', [CplmkController::class, 'delete']);
                // soal
                Route::get('list-soal', [SoalController::class, 'list']);
                Route::get('print-soal/{id}', [SoalController::class, 'print']);
                // kurikulum
                Route::post('add-kurikulum', [KurikulumController::class, 'store']);
                Route::get('edit-kurikulum/{id}', [KurikulumController::class, 'edit']);
                Route::put('edit-kurikulum/{id}', [KurikulumController::class, 'update']);
                Route::delete('delete-kurikulum/{id}', [KurikulumController::class, 'delete']);
                Route::get('list-kurikulum', [KurikulumController::class, 'list']);
            }
        );

        // penjamin mutu
        Route::middleware('penjamin-mutu')->prefix('penjamin-mutu')->group(
            function () {
                Route::get('dashboard', function () {
                    return view('penjamin-mutu.dashboard');
                })->name('home');
                Route::get('list-soal', [SoalPM::class, 'list']);
                Route::post('validasi-soal/{id}', [SoalPM::class, 'validasi']);
                Route::post('tolak-soal/{id}', [SoalPM::class, 'tolak_validasi']);
                Route::get('print-soal/{id}', [SoalPM::class, 'print']);
            }
        );
    }
);


require __DIR__ . '/auth.php';
