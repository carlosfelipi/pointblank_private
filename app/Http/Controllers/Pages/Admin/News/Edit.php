<?php

namespace App\Http\Controllers\Pages\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Blog;
use App\Http\Controllers\Modules\Message;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Edit extends Controller
{
    public function newsEditAdmin(int $id)
    {
        return view('pages.admin.news.edit', [
            'item' =>  News::findOrFail($id),
            'modulesBlog' => new Blog()
        ]);
    }

    public function newsEditProcess(Request $request)
    {
        $validatedData = $request->validate($this->rules(), $this->messages());
        $blog = News::findOrFail($request->id);
        $blog->fill([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'type' => $validatedData['type'],
            'post' => $validatedData['post'],
            'updated_at' => Carbon::now(),
            'expired_at' => $validatedData['end'],
            'author' => Auth::user()->login,
            'state' => true,
        ]);
        if ($blog->save()) {
            return redirect()->route('newsManagerAdminPage')->with('message', Message::sendAlert(["msg" => "Notícia foi atualizada.", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao atualizar notícia, contate o suporte do site.", "type" => "error"]));
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:40'],
            'description' => ['required', 'string', 'min:5', 'max:50'],
            'type' => ['required', 'in:1,2,3'],
            'end' => ['required', 'date'],
            'post' => ['required', 'string', 'min:5', 'max:5000'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Adicione um título à notícia.',
            'title.string' => 'O título deve ser uma string.',
            'title.min' => 'O título deve ter no mínimo :min caracteres.',
            'title.max' => 'O título deve ter no máximo :max caracteres.',
            'description.required' => 'Adicione um subtitulo à notícia.',
            'description.string' => 'O subtitulo deve ser uma string.',
            'description.min' => 'A descrição deve ter no mínimo :min caracteres.',
            'description.max' => 'A descrição deve ter no máximo :max caracteres.',
            'type.required' => 'Escolha um tipo de notícia.',
            'type.in' => 'O tipo de notícia selecionado é inválido.',
            'end.required' => 'Selecione uma data de encerramento válida.',
            'end.date' => 'O campo de encerramento deve ser uma data válida.',
            'post.required' => 'Adicione um conteúdo para o post da notícia.',
            'post.string' => 'O conteúdo do post deve ser uma string.',
            'post.min' => 'O conteúdo do post deve ter no mínimo :min caracteres.',
            'post.max' => 'O conteúdo do post deve ter no máximo :max caracteres.',
        ];
    }
}
