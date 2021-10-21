<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;

class NewPost extends Component
{
    public $post_id;

    public Post $post;

    protected $rules = [
        'post.title'        => 'required|max:255',
        'post.body'         => 'required'
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

        return redirect()->to('posts')->with('message', 'Post saved successfully.');
    }
}
