<?php

namespace App\Http\Controllers\Pages\Event;

use Livewire\Component;

class Battle extends Component
{
    public function render()
    {
        return view('pages.event.battle')->layout('components.layouts.event.battle.battle');
    }
}
