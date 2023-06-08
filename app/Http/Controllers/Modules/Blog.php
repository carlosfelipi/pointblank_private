<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;

class Blog extends Controller
{
    public function typeBlog($type)
    {
        switch ($type) {
            case '1':
                return 'Evento';
            case '2':
                return 'Atualização';
            case '3':
                return 'Notícia';
            default:
                return '-';
        }
    }

    public function typeBlogUrl($type)
    {
        switch ($type) {
            case '1':
                return 'evento';
            case '2':
                return 'atualizacao';
            case '3':
                return 'notícia';
            default:
                return 'noData';
        }
    }

    public function typeBlogColor($type)
    {
        switch ($type) {
            case 1:
                return 'dark';
            case 2:
                return 'success';
            case 3:
                return 'danger';
            default:
                return '-';
        }
    }
}
