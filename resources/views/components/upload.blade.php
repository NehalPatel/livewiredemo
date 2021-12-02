<div class="uploaded_images">

    <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true" x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress">
        <div class="w-full rounded-lg text-center text-gray-500 p-4 cursor-pointer border border-dashed border-gray-500 my-3" @click="$refs.uploadbtn.click()" style="border-style: dashed !important;">
            <span class="text-dark">Upload max 3 files | PNG, JPEG | <1024 KB</span>
        </div>
        <input x-ref="uploadbtn" type="file" multiple wire:model="photos" class="hidden" />

        <!-- Progress Bar -->
        <div x-show="isUploading">
            <progress max="100" x-bind:value="progress" class="w-full" style="width: 100%"></progress>
        </div>
    </div>

    <div class="wrapper">
        @if(0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <div class="error-wrapper">
                <strong>File too large, max 1024 KB</strong>
                <ul>
                    <li class="d-flex p-2 align-items-center">
                        <img src="https://via.placeholder.com/50" alt="" class="img-thumbnail mr-2">
                        <span>girl1.jpeg (size: 2045kb)</span>
                    </li>
                    <li class="d-flex p-2 align-items-center">
                        <img src="https://via.placeholder.com/50" alt="" class="img-thumbnail mr-2">
                        <span>girl2.jpeg (size: 3525kb)</span>
                    </li>
                </ul>
            </div>

            <div class="error-wrapper border-top border-danger pt-3">
                <strong>You must upload a file of type image/png, image/jpeg</strong>
                <ul>
                    <li>
                        <span>invalid-filename-input.css</span>
                    </li>
                </ul>
            </div>
        </div>
        @endif

        @if ($photos)
        <div class="uploaded-images">
            <div class="card">
                <div class="card-body">
                    @foreach($photos as $key => $photo)
                    <div class="item-wrapper d-flex align-items-center p-2 @if (!$loop->first) border-top @endif">

                        <img src="{{$photo->temporaryUrl()}}" width="100" height="100" class="img-thumbnail align-self-start">

                        <div class="meta p-2">
                            <p class="card-text m-0 text-dark">{{$photo->getClientOriginalExtension()}}</p>
                            <p class="card-text text-dark">{{ number_format( $photo->getSize() / 1048576,2); }} KB</p>
                            <a class="btn btn-sm btn-outline-primary" href="#">Download</a>
                        </div>

                        <div class="extras p-2 align-self-end">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <p class="text text-dark">{{ $photo->getClientOriginalName() }}</p>
                            </div>
                            <a href="#" class="close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
