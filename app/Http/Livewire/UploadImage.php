<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImage extends Component
{
    use WithFileUploads;

    public $avatar;

    public function render()
    {
        return view('livewire.upload-image');
    }

    public function save()
    {
        $this->validate([
            'avatar' => 'required|image|max:100', // 1MB Max
        ]);

        $this->avatar->store('avatars');
    }
}
