<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\widgetController;
use App\Http\Controllers\CustomWidgetController;
use App\Http\Controllers\widgetPermissionsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\rpiStoreController;
use App\Http\Controllers\databaseController;


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
Route::post('/widget-permissions', [widgetPermissionsController::class, 'store'])->name('widgetPermissionsController.store');

Route::post('/delete-dashboard', [databaseController::class, 'destroy'])->name('dashboardController.destroy');

Route::post('/addDatabase', [databaseController::class, 'store'])->name('databaseController.store');
//Updating widget position
Route::post('/update-widget-position', [CustomWidgetController::class, 'updatePosition']);
//Deleting a widget
Route::post('/delete-widget', [CustomWidgetController::class, 'deleteWidget']);
//Show databoxes




Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('rpiStore', [rpiStoreController::class, 'store']);
