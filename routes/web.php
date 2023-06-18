<?php


use App\Http\Controllers\Pages\Auth\ConfirmEmail;
use App\Http\Controllers\Pages\Auth\Forgot\Password\StepOne;
use App\Http\Controllers\Pages\Auth\Forgot\Password\StepTwo;
use App\Http\Controllers\Pages\Auth\Login;
use App\Http\Controllers\Pages\Auth\Logout;
use App\Http\Controllers\Pages\Auth\Register;
use App\Http\Controllers\Pages\Blog as PagesBlog;
use App\Http\Controllers\Pages\Download;
use App\Http\Controllers\Pages\Index;
use App\Http\Controllers\Pages\Market\Detail;
use App\Http\Controllers\Pages\Market\Itens;
use App\Http\Controllers\Pages\Player\Coupon;
use App\Http\Controllers\Pages\Ranking\Clan;
use App\Http\Controllers\Pages\Ranking\Individual;
use App\Http\Controllers\Pages\Ranking\Profile\Player;
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
  Route::get('logout', [Logout::class, 'logout'])->name('logout');
});

Route::prefix('game')->group(function () {
  Route::get('status', [Status::class, 'statusPage'])->name('statusPage');
  Route::get('downloads', [Download::class, 'downloadPage'])->name('downloadPage');
});

Route::prefix('noticias')->group(function () {
  Route::get('/', [PagesBlog::class, 'blogPage'])->name('blogPage');
  Route::get('/visualizar/{id}', [PagesBlog::class, 'blogPageDetail'])->name('blogPageDetail');
});

Route::prefix('ranking')->group(function () {
  Route::get('individual/list', Individual::class)->name('individualPage');
  Route::get('individual/{id}/{name}', Player::class)->name('profilePlayerPage');
  Route::get('clan/list', Clan::class)->name('clanPage');
});

Route::prefix('market')->group(function () {
  Route::get('itens', Itens::class)->name('marketPage');
  Route::get('detail/{item}/{name}', Detail::class)->name('marketDetailPage');
});

Route::prefix('player')->middleware('auth')->group(function () {
  Route::get('coupon', Coupon::class)->name('couponPage');
});

Route::view('termos-de-serviço', 'pages.terms')->name('termsPage');
Route::view('regras', 'pages.rules')->name('rulesPage');

Route::prefix('error')->group(function () {
  Route::view('401', 'errors.401')->name('error401');
  Route::view('402', 'errors.402')->name('error402');
  Route::view('403', 'errors.403')->name('error403');
  Route::view('404', 'errors.404')->name('error404');
  Route::view('419', 'errors.419')->name('error419');
  Route::view('429', 'errors.429')->name('error429');
  Route::view('500', 'errors.500')->name('error500');
  Route::view('503', 'errors.503')->name('error503');
});
