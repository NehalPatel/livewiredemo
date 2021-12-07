<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div class="float-lg-right">
        <a href="{{ route('posts.create') }}" class="btn btn-primary btn-elevate btn-icon-sm">
            <i class="la la-plus"></i>
            New Post
        </a>
    </div>
    <div class="clearfix"></div>
    <br>
    @if($posts->isEmpty())
        <p>No posts found. Create new post</p>
    @else
    <table class="table table-striped- table-bordered table-hover table-checkable">
        <thead>
        <tr>
            <th wire:click="sortByColumn('name')">
                Title
                @if ($sortColumn == 'name')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th wire:click="sortByColumn('created_at')">
                Created At
                @if ($sortColumn == 'created_at')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th wire:click="sortByColumn('updated_at')">
                Updated At
                @if ($sortColumn == 'updated_at')
                    <i class="fa fa-fw fa-sort-{{ $sortDirection }}"></i>
                @else
                    <i class="fa fa-fw fa-sort" style="color:#DCDCDC"></i>
                @endif
            </th>
            <th width="200" style="text-align:center">Actions</th>
        </tr>
        <tr>
            <td>
                <input type="text" class="form-control" wire:model="searchColumns.title"/>
            </td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->created_at->diffForHumans() }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>
                <td>
                    <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-secondary">
                        Edit
                    </a>
                    <a href="#" class="btn btn-danger" wire:click="delete({{ $post->id }})">
                        Delete
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
    @endif
</div>
