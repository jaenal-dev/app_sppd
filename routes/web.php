<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Nppd\NppdController;
use App\Http\Controllers\Sppd\SppdController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Location\LocationController;
use App\Http\Controllers\Report\ReportController;
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

    Route::resource('/user', UserController::class);

    Route::get('/profile/user', [ProfileController::class, 'index'])->name('profile');

    Route::resource('/sppd', SppdController::class);

    Route::resource('/nppd', NppdController::class);

    Route::resource('/location', LocationController::class);

    Route::resource('/transport', TransportController::class);

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/create/{id}', [ReportController::class, 'create'])->name('report.create');
    Route::post('/report/store', [ReportController::class, 'store'])->name('report.store');
    Route::get('/report/{id}/edit', [ReportController::class, 'edit'])->name('report.edit');
    Route::put('/report/{id}', [ReportController::class, 'update'])->name('report.update');
    Route::delete('/report/{report}', [ReportController::class, 'destroy'])->name('report.destroy');
    Route::get('/report/print', [ReportController::class, 'print'])->name('report.print');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
