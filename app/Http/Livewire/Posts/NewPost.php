<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithFileUploads;

class NewPost extends Component
{
    use WithFileUploads;

    public Post $post;

    public $photos = [];

    protected $rules = [
        'post.title'        => 'required|max:255',
        'post.body'         => 'required',
        'photos.*'          => 'image|mimes:png,jpg|max:1024', // 1MB Max
    ];

    public function mount(Post $post)
    {
        $this->post = $post;

        $this->post['media'] = $post->getMedia();
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
            $fileName = $photo->getClientOriginalName();
            $this->post
                ->addMedia($photo->getRealPath())
                ->usingName($fileName)
                ->sanitizingFileName(function ($fileName) {
                    return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
                })
                ->toMediaCollection();
        }
        $this->photos = [];

        return redirect()->to('posts')->with('message', 'Post saved successfully.');
    }

    public function removeMedia($post_id, $media_id)
    {
        $this->post->deleteMedia($media_id);
        $this->post = Post::findOrFail($post_id);
        $this->post['media'] = $this->post->getMedia();
    }

    public function remove($index)
    {
        $this->resetValidation();
        array_splice($this->photos, $index, 1);
    }
}
