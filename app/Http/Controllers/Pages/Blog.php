<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Blog as ModulesBlog;
use App\Http\Controllers\Modules\Date;
use App\Models\News;
use Illuminate\Http\Request;

class Blog extends Controller
{
    public function blogPage()
    {
        return view('pages.blog.blog', [
            'news' => News::where('state', true)->orderByDesc('created_at')->paginate(10),
            'modulesBlog' => new ModulesBlog(),
            'date' => new Date()

        ]);
    }

    public function blogPageDetail(Request $request)
    {
        $blog = News::findOrFail($request->id);
        return view('pages.blog.detail', [
            'blog' => $blog,
            'modulesBlog' => new ModulesBlog(),
            'date' => new Date()
        ]);
    }
}
