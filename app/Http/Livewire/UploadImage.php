<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadImage extends Component
{
    use WithFileUploads;

    public $photos = [];

    public function render()
    {
        return view('livewire.upload-image');
    }

    public function save()
    {
        $this->validate([
            'photos.*' => 'required|image|max:2048', // 2MB Max
        ]);

        foreach ($this->photos as $key => $photo) {
            $this->photos[$key] = $photo->store('photo');
        }

        $this->photos = [];

        session()->flash('message', 'Images uploaded successfully.');
    }
}
