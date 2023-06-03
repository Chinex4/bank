<?php

use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\CoingateController;
use App\Http\Controllers\HomeControlller;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WithdrawalController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify'=> true]);

// Route::post('/payment/callback', [CoingateController::class, 'redirectToGateway'])->name('payment.callback');
Route::post('/payment/redirect', [CoingateController::class, 'redirectToGateway'])->name('coingate.redirect');

Route::group([ 'prefix' => 'dashboard', 'middleware' => ['auth', 'verified'],],function(){
    Route::get('', [HomeControlller::class, 'index'])->name('dashboard-page');
    Route::get('/profile', [ HomeControlller::class, 'profile'])->name('profile-page');
    Route::put('/profile_update/{id}', [HomeControlller::class, 'update_profile'])->name('update-profile-page');
    Route::put('change-passwprd', [HomeControlller::class, 'validatepassword'])->name('change-password-page');
    Route::get('/deposit', [PageController::class, 'deposit'])->name('deposit-page');
    Route::get('/transaction', [PageController::class, 'transaction'])->name('transaction-page');
    Route::get('/withdrawal', [PageController::class, 'withdrawal'])->name('withdrawal-page');
    Route::post('/withdrawal-store', [PageController::class, 'withdrawalStore'])->name('withdrawal-store');
    Route::post('/deposit-store', [PageController::class, 'confirmDeposit'])->name('deposit-store');
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('optimize',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize');
        return 1;
    });
    Route::get('clear',function (){
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        return 1;
    });
})->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
