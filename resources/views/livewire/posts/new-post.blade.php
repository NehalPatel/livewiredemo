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

        @if($post->media)
        <div class="row">
            @foreach($post->media as $photo)
            <div class="col-sm-3">
                <img src="{{ $photo->getUrl('thumbnail') }}" alt="" height="200" width="200" class="img-fluid img-thumbnail">
                <a href="#" class="btn btn-danger btn-block" wire:click="removeMedia({{ $post->id }}, {{$photo->id}})">Remove</a>
            </div>
            @endforeach
        </div>
        @endif

        <livwire:upload_photos />

        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
            <div class="w-full rounded-lg text-center text-gray-500 p-4 cursor-pointer border border-dashed border-gray-500" @click="$refs.fileInput.click()">
                Upload Images
            </div>
            <input x-ref="fileInput" type="file" multiple wire:model="photos" class="hidden" />

            <!-- Progress Bar -->
            <div x-show="isUploading">
                <progress max="100" x-bind:value="progress" class="w-full" style="width: 100%"></progress>
            </div>
        </div>

        @if ($photos)
        <div class="row">
            @foreach($photos as $photo)
            <div class="col-sm-4" wire:key="{{$loop->index}}">
                <i class="fas fa-times-circle text-gray-700 text-2xl float-right cursor-pointer" wire:click="remove({{$loop->index}})"></i>
                <div class="flex justify-center">
                    <img src="{{ $photo->temporaryUrl() }}" height="200px" class="img-thumbnail img-fluid">
                </div>

                @error("photos.$loop->index")
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Error!</strong>
                    <span class="error">{{ $message }}</span>
                </div>
                @enderror
            </div>
            @endforeach
        </div>
        @endif

        <div class="form-group">
            <div class="float-lg-right">
                <input class="btn btn-primary" type="submit" value="Save"> &nbsp;
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
