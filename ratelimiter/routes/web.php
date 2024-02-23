<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rateLimitController;

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

Route::get('/check-session', [rateLimitController::class, 'check_session']);

Route::middleware(['rate.limit'])->group(function () {
    Route::post('/check-ips-session', [rateLimitController::class, 'index'])->name('check_ip_session');
});