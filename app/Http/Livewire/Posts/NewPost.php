<?php

namespace App\Http\Livewire\Posts;

use App\Traits\WithImageUploader;
use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads, WithImageUploader;

    public Post $post;

    protected $rules = [
        'post.title'        => 'required|max:255',
        'post.body'         => 'required',
        'photos.*'          => 'image|mimes:png,jpg|max:1024', // 1MB Max
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.posts.new-post');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->post->save();

        $this->saveMedia($this->post);

        return redirect()->to('posts')->with('message', 'Post saved successfully.');
    }

    public function removeMedia()
    {
        $this->deleteSavedMedia($this->post);
    }
}
