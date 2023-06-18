<?php


use Illuminate\Http\Request;
use App\Http\Controllers\Pages\Admin\Coupon\Itemcode;
use App\Http\Controllers\Pages\Admin\Coupon\Pincode;
use App\Http\Controllers\Pages\Admin\Index as AdminIndex;
use App\Http\Controllers\Pages\Admin\News\Add;
use App\Http\Controllers\Pages\Admin\News\Edit;
use App\Http\Controllers\Pages\Admin\News\Manager;
use App\Http\Controllers\Pages\Admin\Server\Events\Login as EventsLogin;
use App\Http\Controllers\Pages\Admin\Server\Events\Mapbonus;
use App\Http\Controllers\Pages\Admin\Server\Events\Playtime;
use App\Http\Controllers\Pages\Admin\Server\Events\Quest;
use App\Http\Controllers\Pages\Admin\Server\Events\Xmas;
use App\Http\Controllers\Pages\Admin\Server\Events\RankUp;
use App\Http\Controllers\Pages\Admin\Server\Events\Visit;
use App\Http\Controllers\Pages\Admin\Webshop\Add as WebshopAdd;
use App\Http\Controllers\Pages\Admin\Webshop\Manager as WebshopManager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::get('/', [AdminIndex::class, 'indexAdminPage'])->name('indexAdminPage');

    Route::prefix('coupon')->group(function () {
      Route::get('add/itemcode', [Itemcode::class, 'itemcodeAdminPage'])->name('itemcodeAdminPage');
      Route::post('proccess/add/itemcode', [Itemcode::class, 'itemcodeProccessCreate'])->name('itemcodeProccessCreate');
      Route::post('proccess/delete/itemcode/{id}', [Itemcode::class, 'itemcodeProccessDelete'])->name('itemcodeProccessDelete');
      Route::get('add/pincode', [Pincode::class, 'pincodeAdminPage'])->name('pincodeAdminPage');
      Route::post('proccess/add/pincode', [Pincode::class, 'pincodeProccessCreate'])->name('pincodeProccessCreate');
    });
  
    Route::prefix('news')->group(function () {
      Route::get('add', [Add::class, 'newsAddAdminPage'])->name('newsAddAdminPage');
      Route::post('process/add', [Add::class, 'newsAddProcess'])->name('newsAddProcess');
      Route::get('manager', [Manager::class, 'newsManagerAdminPage'])->name('newsManagerAdminPage');
      Route::post('process/delete/{id}', [Manager::class, 'newsDeleteProcess'])->name('newsDeleteProcess');
      Route::get('edit/{id}', [Edit::class, 'newsEditAdmin'])->name('newsEditAdmin');
      Route::post('process/edit/{id}', [Edit::class, 'newsEditProcess'])->name('newsEditProcess');
    });
  
    Route::prefix('webshop')->group(function () {
      Route::get('add', [WebshopAdd::class, 'webShopAdminPage'])->name('webShopAdminPage');
      Route::post('proccess/add', [WebshopAdd::class, 'webShopProccessCreate'])->name('webShopProccessCreate');
      Route::get('manager', [WebshopManager::class, 'webShopItensAdminPage'])->name('webShopItensAdminPage');
      Route::post('proccess/delete/{id}', [WebshopManager::class, 'webShopProccessDelete'])->name('webShopProccessDelete');
      Route::post('proccess/update/{id}', [WebshopManager::class, 'webShopProccessUpdate'])->name('webShopProccessUpdate');
    });
  
    Route::prefix('event')->group(function () {
      Route::get('add/xmas', [Xmas::class, 'xmasAddAdminPage'])->name('xmasAddAdminPage');
      Route::post('process/add/xmas', [Xmas::class, 'xmasAddProcess'])->name('xmasAddProcess');
      Route::post('proccess/xmas/delete/xmas/{id}', [Xmas::class, 'xmasDeleteProcess'])->name('xmasDeleteProcess');
      Route::get('add/rankup', [RankUp::class, 'rankupAddAdminPage'])->name('rankupAddAdminPage');
      Route::post('process/add/rankup', [RankUp::class, 'rankupAddProcess'])->name('rankupAddProcess');
      Route::post('process/rankup/delete/{id}', [RankUp::class, 'rankUpDeleteProcess'])->name('rankUpDeleteProcess');
      Route::get('add/visit', [Visit::class, 'visitAddAdminPage'])->name('visitAddAdminPage');
      Route::post('process/add/visit', [Visit::class, 'visitAddProcess'])->name('visitAddProcess');
      Route::post('process/visit/delete/{id}', [Visit::class, 'visitDeleteProcess'])->name('visitDeleteProcess');
      Route::get('add/quest', [Quest::class, 'questAddAdminPage'])->name('questAddAdminPage');
      Route::post('proccess/add/quest', [Quest::class, 'questAddProcess'])->name('questAddProcess');
      Route::post('proccess/quest/delete/{id}', [Quest::class, 'questDeleteProcess'])->name('questDeleteProcess');
      Route::get('add/playtime', [Playtime::class, 'playTimeAddAdminPage'])->name('playTimeAddAdminPage');
      Route::post('proccess/add/playtime', [Playtime::class, 'playTimeAddProcess'])->name('playTimeAddProcess');
      Route::post('proccess/playtime/delete/{id}', [Playtime::class, 'playTimeDeleteProcess'])->name('playTimeDeleteProcess');
      Route::get('add/login', [EventsLogin::class, 'loginAddAdminPage'])->name('loginAddAdminPage');
      Route::post('proccess/add/login', [EventsLogin::class, 'loginAddProcess'])->name('loginAddProcess');
      Route::post('proccess/login/delete/{id}', [EventsLogin::class, 'loginDeleteProcess'])->name('loginDeleteProcess');
      Route::get('add/mapbonus', [Mapbonus::class, 'mapBonusAddAdminPage'])->name('mapBonusAddAdminPage');
      Route::post('proccess/add/mapbonus', [Mapbonus::class, 'mapBonusAddProcess'])->name('mapBonusAddProcess');
      Route::post('proccess/mapbonus/delete/{id}', [Mapbonus::class, 'mapBonusDeleteProcess'])->name('mapBonusDeleteProcess');
    });

  