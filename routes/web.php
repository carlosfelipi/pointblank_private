<?php

use App\Http\Controllers\Pages\Admin\Blog;
use App\Http\Controllers\Pages\Admin\Coupon\Itemcode;
use App\Http\Controllers\Pages\Admin\Coupon\Pincode;
use App\Http\Controllers\Pages\Admin\Index as AdminIndex;
use App\Http\Controllers\Pages\Admin\Webshop;
use App\Http\Controllers\Pages\Auth\ConfirmEmail;
use App\Http\Controllers\Pages\Auth\Forgot\Password\StepOne;
use App\Http\Controllers\Pages\Auth\Forgot\Password\StepTwo;
use App\Http\Controllers\Pages\Auth\Login;
use App\Http\Controllers\Pages\Auth\Logout;
use App\Http\Controllers\Pages\Auth\Register;
use App\Http\Controllers\Pages\Auth\Social\Provider;
use App\Http\Controllers\Pages\Auth\Social\Complete;
use App\Http\Controllers\Pages\Blog as PagesBlog;
use App\Http\Controllers\Pages\Download;
use App\Http\Controllers\Pages\Index;
use App\Http\Controllers\Pages\Market\Itens;
use App\Http\Controllers\Pages\Player\Coupon;
use App\Http\Controllers\Pages\Player\Roulette;
use App\Http\Controllers\Pages\Ranking\Clan;
use App\Http\Controllers\Pages\Ranking\Individual;
use App\Http\Controllers\Pages\Ranking\Profile\Player;
use App\Http\Controllers\Pages\Ranking\Season;
use App\Http\Controllers\Pages\Status;
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

Route::get('/', [Index::class, 'indexPage'])->name('indexPage');

Route::prefix('auth')->group(function () {
  Route::get('login', Login::class)->middleware('session')->name('loginPage');
  Route::get('register', Register::class)->middleware('session')->name('registerPage');
  Route::get('forgot_my_password', StepOne::class)->middleware('session')->name('forgotPasswordStepOnePage');
  Route::get('register-new-password', StepTwo::class)->middleware('session')->name('forgotPasswordStepTwoPage');
  Route::get('confirm/account/{token}', [ConfirmEmail::class, 'confirmProccess'])->middleware('session')->name('confirmProccess');
  Route::get('with/{provider}', [Provider::class, 'redirectProvider'])->name('redirectProvider');
  Route::get('with/{provider}/callback', [Provider::class, 'providerCallback'])->name('providerCallback');
  Route::get('complete-my-account/{provider}', Complete::class)->middleware('session')->name('completeSocialPage');
  Route::get('logout', [Logout::class, 'logout'])->name('logout');
});

Route::prefix('game')->group(function () {
  Route::get('status', [Status::class, 'statusPage'])->name('statusPage');
  Route::get('downloads', [Download::class, 'downloadPage'])->name('downloadPage');
});

Route::prefix('noticias')->group(function () {
  Route::get('/', [PagesBlog::class, 'blogPage'])->name('blogPage');
  Route::get('{type}/{id}/{name}', [PagesBlog::class, 'blogPageDetail'])->name('blogPageDetail');
});

Route::prefix('ranking')->group(function () {
  Route::get('individual/list', Individual::class)->name('individualPage');
  Route::get('individual/{id}/{name}', Player::class)->name('profilePlayerPage');
  Route::get('clan/list', Clan::class)->name('clanPage');
  ///Route::get('clan/{id}/{name}', ProfileClan::class)->name('profileClanPage');
  Route::get('season/list', Season::class)->name('seasonPage');
});

Route::prefix('market')->group(function () {
  Route::get('/', Itens::class)->name('marketPage');
});

Route::prefix('player')->middleware('auth')->group(function () {
  Route::get('coupon', Coupon::class)->name('couponPage');
  Route::get('roulette', [Roulette::class, 'roulettePage'])->name('roulettePage');
  Route::get('roulette/proccess/spin', [Roulette::class, 'spinRoulette'])->name('spinRoulette');
  Route::get('roulette/proccess/roulette', [Roulette::class, 'receiveRoulette'])->name('receiveRoulette');
});

Route::view('termos-de-serviço', 'pages.terms')->name('termsPage');
Route::view('regras', 'pages.rules')->name('rulesPage');



//Admin Routes;
Route::prefix('dashboard')->middleware('admin')->group(function () {
  Route::get('/', [AdminIndex::class, 'indexAdminPage'])->name('indexAdminPage');

  Route::prefix('coupon')->group(function () {
    Route::get('add/itemcode', [Itemcode::class, 'itemcodeAdminPage'])->name('itemcodeAdminPage');
    Route::post('proccess/add/itemcode', [Itemcode::class, 'itemcodeProccessCreate'])->name('itemcodeProccessCreate');
    Route::post('proccess/delete/itemcode/{id}', [Itemcode::class, 'itemcodeProccessDelete'])->name('itemcodeProccessDelete');
    Route::get('add/pincode', [Pincode::class, 'pincodeAdminPage'])->name('pincodeAdminPage');
    Route::post('proccess/add/pincode', [Pincode::class, 'pincodeProccessCreate'])->name('pincodeProccessCreate');
  });

  Route::prefix('news')->group(function () {
    Route::get('add', [Blog::class, 'blogAdminPage'])->name('blogAdminPage');
    Route::post('proccess/add', [Blog::class, 'blogProccessCreate'])->name('blogProccessCreate');
    Route::post('proccess/delete/{id}', [Blog::class, 'blogProccessDelete'])->name('blogProccessDelete');
    Route::get('list', [Blog::class, 'blogAdminListPage'])->name('blogAdminListPage');
    Route::get('edit/{id}', [Blog::class, 'blogAdminEdit'])->name('blogAdminEdit');
  });

  Route::prefix('webshop')->group(function () {
    Route::get('add', [Webshop::class, 'webShopAdminPage'])->name('webShopAdminPage');
    Route::post('proccess/add', [Webshop::class, 'webShopProccessCreate'])->name('webShopProccessCreate');
    Route::get('itens', [Webshop::class, 'webShopItensAdminPage'])->name('webShopItensAdminPage');
    Route::post('proccess/delete/{id}', [Webshop::class, 'webShopProccessDelete'])->name('webShopProccessDelete');
    Route::post('proccess/update/{id}', [Webshop::class, 'webShopProccessUpdate'])->name('webShopProccessUpdate');
  });


});
