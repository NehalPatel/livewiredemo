<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['delete'];

    public $limit = 10;
    public $sortColumn = 'id';
    public $sortDirection = 'desc';
    public $searchColumns = [
        'title' => '',
        'is_published'  => '',
    ];

    public function sortByColumn($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->reset('sortDirection');
            $this->sortColumn = $column;
        }
    }

    public function render()
    {
        $posts = Post::orderBy($this->sortColumn, $this->sortDirection);

        foreach ($this->searchColumns as $column => $value) {
            if (!empty($value)) {
                $posts->where($column, 'LIKE', '%' . $value . '%');
            }
        }

        return view('livewire.posts.posts', [
            'posts' => $posts->paginate($this->limit)
        ]);
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
    }
}
