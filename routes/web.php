<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\widgetController;

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
    return view('login');
});



Route::post('/changeWidget', [widgetController::class, 'store']);
Route::get('/retrieveWidget', [widgetController::class, 'show']);

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard')->middleware('auth');

