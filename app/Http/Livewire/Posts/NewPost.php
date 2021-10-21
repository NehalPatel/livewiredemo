<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;

    public $post_id;

    public Post $post;

    public $photos = [];

    protected $rules = [
        'post.title'        => 'required|max:255',
        'post.body'         => 'required',
        'photos.*'          => 'image|max:1024', // 1MB Max
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

        foreach ($this->photos as $photo) {
            $photo->store('photos');
        }
        $this->photos = [];

        return redirect()->to('posts')->with('message', 'Post saved successfully.');
    }
}
