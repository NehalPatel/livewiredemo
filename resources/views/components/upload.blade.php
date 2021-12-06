<div class="uploaded_images">

    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
        <div class="btn btn-block btn-primary border my-3 py-2" @click="$refs.uploadbtn.click()" style="border-style: dashed !important;">
            <span>Upload Images | PNG, JPEG | <1024 KB</span>
        </div>
        <input x-ref="uploadbtn" type="file" multiple wire:model="photos" class="hidden" />

        <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress" class="w-full" style="width: 100%"></progress>
        </div>
    </div>

    <div class="wrapper">
        @if ($photos)
        <div class="uploaded-images mb-3">
            <div class="card">
                <div class="card-body">
                    @foreach($photos as $key => $photo)

                    <div class="item-wrapper d-flex align-items-top @if (!$loop->first) border-top @endif">

                        <img src="{{$photo->temporaryUrl()}}" width="100" height="100" class="img-thumbnail align-self-start">

                        <div class="meta">
                            <p class="card-text m-0 text-dark">{{$photo->getClientOriginalExtension()}}</p>
                            <p class="card-text m-0 text-dark">{{ number_format( $photo->getSize() / 1024,2) }} KB</p>
                        </div>

                        <div class="extras">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <p class="text text-dark">{{ $photo->getClientOriginalName() }}</p>
                            </div>
                            <a href="#" class="close" wire:click.prevent="remove({{ $loop->index }})">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                    </div>

                    @error('photos.' . $loop->index)
                    <p class="text-danger">
                        <span class="error">{{ $message }}</span>
                    </p>
                    @enderror

                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
