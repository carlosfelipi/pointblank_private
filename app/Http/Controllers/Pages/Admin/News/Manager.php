<?php

namespace App\Http\Controllers\Pages\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Blog;
use App\Http\Controllers\Modules\Message;
use App\Models\News;
//use Illuminate\Http\Request;

class Manager extends Controller
{
    public function newsManagerAdminPage()
    {
        return view('pages.admin.news.manager', [
            'news' => News::orderByDesc('expired_at')->get(),
            'modulesBlog' => new Blog()
        ]);
    }

    public function newsDeleteProcess(int $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Notícia $news->title  foi deletada.", "type" => "success"]));
    }
}
