<?php

namespace App\Http\Controllers\Pages\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Blog as ModulesBlog;
use App\Http\Controllers\Modules\Message;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Blog extends Controller
{
    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'type' => 'required',
        'end' => 'required',
        'card' => 'nullable',
        'post' => 'required'
    ];

    protected $messages = [
        'title.required' => 'Adicione um titulo a notícia.',
        'description.required' => 'Adicione um subtitulo a notícia.',
        'type.required' => 'Escolha um tipo de notícia.',
        'end.required' => 'Escolha uma data de encerramento.',
        'card.nullable' => 'Adicione um card para a notícia',
        'post.required' => 'Adicione um post para a notícia.'
    ];

    public function blogAdminPage()
    {
        return view('pages.admin.blog.add');
    }

    public function blogProccessCreate(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        $validated = $validator->validate();
        if ($request->hasFile('card') && $request->file('card')->isValid()) {
            $type = $request->file('card')->getMimeType();
            $file = $request->file('card');
            $bin_string = file_get_contents($file);
            $hex_string = base64_encode($bin_string);
            $image  = 'data:' . 'upload' . '/' . $type . ';base64,' . $hex_string;
        }
        $blog = new News();
        $blog->title = $validated['title'];
        $blog->description = $validated['description'];
        $blog->type = (int)$validated['type'];
        $blog->post = $validated['post'];
        $blog->card = $image;
        $blog->created_at = Carbon::now();
        $blog->expired_at = $validated['end'];
        $blog->author = Auth::user()->login;
        $blog->state = true;
        if ($blog->save()) {
            return redirect()->back()->with('message', Message::sendAlert(["msg" => "Nova notícia foi adicionada", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar novo cupom, contate o suporte do site.", "type" => "error"]));
    }

    public function blogAdminListPage()
    {
        return view('pages.admin.blog.list', [
            'news' => News::orderByDesc('expired_at')->get(),
            'modulesBlog' => new ModulesBlog()
        ]);
    }

    public function blogAdminEdit(int $id)
    {
        $news = News::findOrFail($id);
        return view('pages.admin.blog.edit', [
            'item' => $news,
            'modulesBlog' => new ModulesBlog()
        ]);
    }

    public function blogProccessDelete(int $id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Notícia $news->title  foi deletada.", "type" => "success"]));
    }
}
