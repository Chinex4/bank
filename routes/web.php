<?php

use App\Http\Controllers\CoingateController;
use App\Http\Controllers\ProfileController;
use App\Models\Order;
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

Route::get('/dashboard', function () {
    $transaction = Order::where('user_id', auth()->user()->id)->get();

    return view('dashboard',[
        'transaction'=>$transaction,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::post('/payment/callback', [CoingateController::class, 'redirectToGateway'])->name('payment.callback');
Route::post('/payment/redirect', [CoingateController::class, 'redirectToGateway'])->name('coingate.redirect');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
