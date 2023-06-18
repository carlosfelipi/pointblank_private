<?php

namespace App\Providers;

use App\Models\Account;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use stdClass;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $onlines = Account::where('online', true)->count();
        $rankup = DB::table('events_rankup')->first();
        $gameservers = DB::table('info_gameservers')->first();
        $global = new stdClass();
        $global->onlines = $onlines;
        $global->rankup = $rankup;
        $global->gameservers = $gameservers;
        view()->share('global', $global);
    }
}
