<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class Namecolor extends Controller
{
    public function color($namecolor)
    {
        switch ($namecolor) {
            case 0:
                return '#FFFFFF';
            case 1:
                return '#A80000';
            case 2:
                return '#D60000';
            case 3:
                return '#D8A109';
            case 4:
                return '#D4D800';
            case 5:
                return '#7BB142';
            case 6:
                return '#00924B';
            case 7:
                return '#0396C9';
            case 8:
                return '#015CA2';
            case 9:
                return '#031A4E';
            case 10:
                return '#5C2B87';
        }
    }
}
