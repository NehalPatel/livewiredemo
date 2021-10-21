<div>
    <form class="form" wire:submit.prevent="save">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control @error('post.title') is-invalid @enderror" name="title" id="title" wire:model.lazy="post.title">
            @error('post.title')<span class="error invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="body">Post Details</label>
            <textarea name="body" id="body" cols="30" rows="10" class="form-control @error('post.body') is-invalid @enderror" wire:model.lazy="post.body"></textarea>
            @error('post.body')<span class="error invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <div class="float-lg-right">
                <input class="btn btn-primary" type="submit" value="Save"> &nbsp;
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
