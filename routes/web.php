<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;


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
    return redirect('/login');
});


//Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('auth/login');
})->name('login');

Route::middleware(['auth.check'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route for transfer view and process transfer
    Route::get('/dashboard/transfer', [TransferController::class, 'index'])->name('transfer_view');
    Route::post('/dashboard/transfer', [TransferController::class, 'transfer'])->name('transfer');

    Route::get('/profile', [ProfileController::class, 'profileIndex'])->name('profile');
    Route::get('/profile-edit/{id}', [ProfileController::class, 'profileEdit'])->name('profile-edit');
    Route::put('/profile-editsuccess/{id}', [ProfileController::class, 'profileEditSuccess'])->name('profile-editsuccess');

    // Route for history
    Route::get('/dashboard/history', [HistoryController::class, 'index'])->name('transactions_history');

});
