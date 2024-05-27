<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\widgetController;
use App\Http\Controllers\CustomWidgetController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;


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
    return redirect()->route('login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Creation of custom widget
Route::post('/custom-widgets', [CustomWidgetController::class, 'store'])->name('customWidgets.store');
//Updating widget position
Route::post('/update-widget-position', [CustomWidgetController::class, 'updatePosition']);
//Deleting a widget
Route::post('/delete-widget', [CustomWidgetController::class, 'deleteWidget']);


Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
