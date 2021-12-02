<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Upload extends Component
{
    use WithFileUploads;

    public $photos = [];

    public function render()
    {
        return view('livewire.upload');
    }
}
