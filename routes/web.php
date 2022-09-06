<?php

use App\Http\Controllers\Anggaran\AnggaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Nppd\NppdController;
use App\Http\Controllers\Sppd\SppdController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Profile\{ProfileController, UpdatePasswordController};
use App\Http\Controllers\Auth\{RegisterController, LoginController};
use App\Http\Controllers\Location\LocationController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Spt\SptController;
use App\Http\Controllers\Transport\TransportController;

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

Route::middleware(['guest'])->group(function()
{
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::middleware(['auth'])->group(function()
{
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile/edit', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('/password/edit', [UpdatePasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password/edit', [UpdatePasswordController::class, 'update']);

    Route::resource('/user', UserController::class);

    Route::resource('/sppd', SppdController::class);

    Route::resource('/spt', SptController::class);

    // Route::resource('/nppd', NppdController::class);
    // Route NPPD
    Route::get('/nppd', [NppdController::class, 'index'])->name('nppd.index');
    Route::get('/nppd/create', [NppdController::class, 'create'])->name('nppd.create');
    Route::post('/nppd/create', [NppdController::class, 'store']);
    Route::get('/nppd/{nppd}/edit', [NppdController::class, 'edit'])->name('nppd.edit');
    Route::put('/nppd/{nppd}/edit', [NppdController::class, 'update']);
    Route::delete('/nppd/{nppd}', [NppdController::class, 'destroy'])->name('nppd.destroy');
    Route::put('/status/{nppd}', [NppdController::class, 'status'])->name('status');
    Route::get('/nppd/print/{nppd}', [NppdController::class, 'print'])->name('nppd.print');
    // Route NPPD

    Route::resource('/location', LocationController::class);

    Route::resource('/transport', TransportController::class);

    Route::resource('/anggaran', AnggaranController::class);

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/create/{nppd}', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report/create/{nppd}', [ReportController::class, 'store']);
    Route::get('/report/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/{report}/edit', [ReportController::class, 'update']);
    Route::delete('/report/{report}', [ReportController::class, 'destroy'])->name('report.destroy');
    Route::get('/report/print', [ReportController::class, 'print'])->name('report.print');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
