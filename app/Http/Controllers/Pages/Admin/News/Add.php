<?php

namespace App\Http\Controllers\Pages\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\Message;
use App\Http\Controllers\Modules\Upload;
use App\Models\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Add extends Controller
{
    private $upload;

    public function __construct()
    {
        $this->upload = new Upload();
    }

    public function newsAddAdminPage()
    {
        return view('pages.admin.news.add');
    }

    public function newsAddProcess(Request $response)
    {
        $validatedData = $response->validate($this->rules(), $this->messages());
        $image =
            $response->hasFile('card') && $response->file('card')->isValid()
            ? $this->upload->encodeImage($response->file('card'))
            : null;
        $news = News::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'type' => (int) $validatedData['type'],
            'post' => $validatedData['post'],
            'card' => $image,
            'created_at' => Carbon::now(),
            'expired_at' => $validatedData['end'],
            'author' => Auth::user()->login,
            'state' => true
        ]);
        if ($news) {
            return redirect()->route('newsManagerAdminPage')->with('message', Message::sendAlert(["msg" => "Nova notícia foi adicionada", "type" => "success"]));
        }
        return redirect()->back()->with('message', Message::sendAlert(["msg" => "Erro ao adicionar nova notícia, contate o suporte do site.", "type" => "error"]));
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:5', 'max:40'],
            'description' => ['required', 'string', 'min:5', 'max:50'],
            'type' => ['required', 'in:1,2,3'],
            'end' => ['required', 'date'],
            'card' => ['nullable', 'image'],
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
            'card.nullable' => 'Adicione um card para a notícia.',
            'card.image' => 'O card deve ser uma imagem.',
            'post.required' => 'Adicione um conteúdo para o post da notícia.',
            'post.string' => 'O conteúdo do post deve ser uma string.',
            'post.min' => 'O conteúdo do post deve ter no mínimo :min caracteres.',
            'post.max' => 'O conteúdo do post deve ter no máximo :max caracteres.',
        ];
    }
}
