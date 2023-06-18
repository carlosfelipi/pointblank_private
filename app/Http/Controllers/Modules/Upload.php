<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;

class Upload extends Controller
{
    public function encodeImage($file)
    {
        return 'data:' . $file->getMimeType() . ';base64,' . base64_encode(file_get_contents($file));
    }
}
