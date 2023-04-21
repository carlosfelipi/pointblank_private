<?php

use App\Http\Controllers\Pages\Auth\Confirm;
use App\Http\Controllers\Pages\Auth\Logout;
use App\Http\Controllers\Pages\Auth\Register;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
    toast('Your Post as been submited!','success');
    return view('pages.main.index');
})->name('indexPage');

Route::prefix('member')->group(function () {
    Route::get('register', Register::class)->middleware('session')->name('registerPage');
    Route::get('confirm/account/{token}', [Confirm::class, 'confirmProccess'])->middleware('session')->name('confirmProccess');
    Route::get('logout', [Logout::class, 'logoutProccess'])->middleware('auth')->name('logoutProccess');

});