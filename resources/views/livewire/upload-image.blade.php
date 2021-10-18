<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form wire:submit.prevent="save">

            @if($photos)
                @foreach($photos as $key => $photo)
                    <img src="{{$photo->temporaryUrl()}}" alt="" width="100" height="100">
                @endforeach
                <br>
            @endif

            <div class="form-group">
                <input type="file" wire:model="photos" multiple class="form-control">

                @error('photos.*')
                <small class="text-danger">
                    <span class="error">{{ $message }}</span>
                </small>
                @enderror

                <div wire:loading wire:target="photos">Uploading...</div>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <div class="row row-eq-height">
        @foreach(File::glob(public_path('storage/photos').'/*') as $path)
        <div class="col-md-3 mt-2">
           <img src="{{ str_replace(public_path(), '', $path) }}" class="img-fluid" height="100">
           <a href="#" class="btn btn-outline-primary mt-2 d-flex justify-content-center" wire:click="delete">Delete</a>
        </div>
        @endforeach
    </div>
</div>
