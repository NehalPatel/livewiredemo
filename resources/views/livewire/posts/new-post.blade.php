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

        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
        x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress">
            <div class="w-full rounded-lg text-center text-gray-500 p-4 cursor-pointer border border-dashed border-gray-500" style="background-image: linear-gradient( 89.9deg,  rgba(208,246,255,1) 0.1%, rgba(255,237,237,1) 47.9%, rgba(255,255,231,1) 100.2% );" @click="$refs.fileInput.click()">
            Upload Images
            </div>
            <input x-ref="fileInput" type="file" multiple wire:model="photos" class="hidden" />

            <!-- Progress Bar -->
            <div x-show="isUploading">
                <progress max="100" x-bind:value="progress" class="w-full"></progress>
            </div>
        </div>

        @if ($photos)
            @foreach($photos as $photo)
            <div class="p-4 my-3 rounded-lg shadow-lg transition-all duration-500"
                style="background-image: radial-gradient( circle farthest-corner at 14.2% 27.5%,  rgba(104,199,255,1) 0%, rgba(181,126,255,1) 90% );"
                wire:key="{{$loop->index}}">
                <i class="fas fa-times-circle text-gray-700 text-2xl float-right cursor-pointer"
                    wire:click="remove({{$loop->index}})"></i>
                <div class="flex justify-center">
                    <img src="{{ $photo->temporaryUrl() }}" width="250">
                </div>

                @error("photos.$loop->index")
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                  <strong class="font-bold">Error!</strong>
                  <span class="error">{{ $message }}</span>
                </div>
                @enderror
            </div>
            @endforeach
        @endif

        <div class="form-group">
            <div class="float-lg-right">
                <input class="btn btn-primary" type="submit" value="Save"> &nbsp;
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </div>
    </form>
</div>
