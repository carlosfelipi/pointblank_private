<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\CarbonInterval;

class Date extends Controller
{
    public function convertDateServer($date): string
    {
        return Carbon::createFromFormat('Y-m-d', $date)->format('ymdHi');
    }

    public function unconvertDateServer(string $date): string
    {
        return Carbon::createFromFormat('ymdHi', $date)
            //->format('Y-m-d');
            ->isoFormat('Do [de] MMMM [de] YYYY');
    }

    public function unconvertDateServerTwo(string $date): string
    {
        return Carbon::createFromFormat('ymdHi', $date)
            ->format('d-m-Y');
        //->isoFormat('Do [de] MMMM [de] YYYY');
    }

    public function lastLogin(string $date): string
    {
        return 'Visto por último: ' . Carbon::createFromFormat('ymdHi', $date)
            ->isoFormat('DD [de] MMMM [de] YYYY [às] HH:mm:ss');
    }

    public function accountCreatedAt($date): string
    {
        return 'Membro desde: ' . Carbon::parse($date)->isoFormat('DD [de] MMMM [de] YYYY [às] HH:mm');
    }

    public function dateBlog(string $date): string
    {
        return Carbon::parse($date)->isoFormat('DD [de] MMMM [de] YYYY');
    }

    public function month(string $date): string
    {
        return Carbon::createFromFormat('m', $date)->monthName;
    }

    public function convertToSeconds($value): string
    {
        return CarbonInterval::minutes($value)->totalSeconds;
        // return Carbon::now()->startOfDay()->addSeconds($value)->diffInSeconds());
    }

    public function convertToMinutes($seconds): string
    {
        return Carbon::now()->startOfDay()->addSeconds($seconds)->diffInMinutes(Carbon::now()->startOfDay());
    }
}
