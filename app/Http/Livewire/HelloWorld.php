<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloWorld extends Component
{
    public $name = 'Yaminee Patel';
    public $loud = false;
    public $greeting = ['Hello'];

    public function mount($name)
    {
        $this->name = $name;
    }

    // public function hydrate()
    // {
    //     $this->name = "Unknown";
    // }

    // public function updated()
    // {
    //     $this->name = strtoupper($this->name);
    // }

    public function updatedName($name)
    {
        $this->name = strtoupper($name);
    }

    public function resetName($name)
    {
        $this->name = $name;
    }

    public function render()
    {
        return view('livewire.hello-world');
    }
}
