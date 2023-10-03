<?php

use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('auth/login');
})->name('login');

Route::middleware(['auth.check'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    // Rute lain yang memerlukan autentikasi di sini

    // Route for transfer view and process transfer
    Route::get('/dashboard/transfer', [TransferController::class, 'index'])->name('transfer_view');
    Route::post('/dashboard/transfer', [TransferController::class, 'transfer'])->name('transfer');

});
