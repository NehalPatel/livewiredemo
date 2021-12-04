<h3>Uploaded Images</h3>
@if(!$post->media->isEmpty())
<div class="uploaded-images">
    <div class="card">
        <div class="card-body">
            @foreach($post->media as $key => $photo)
                <div class="item-wrapper d-flex align-items-center p-2 @if (!$loop->first) border-top @endif">

                    <img src="{{ $photo->getUrl('thumbnail') }}" width="100" height="100" class="img-thumbnail align-self-start">

                    <div class="meta p-2">
                        <p class="card-text m-0 text-dark">{{$photo->mime_type}}</p>
                        <p class="card-text m-0 text-dark">{{ number_format( $photo->size / 1024, 2) }} KB</p>
                    </div>

                    <div class="extras p-2 align-self-end">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <p class="text text-dark">{{ $photo->name }}</p>
                        </div>
                        <a href="#" class="close" wire:click="removeMedia({{ $post->id }}, {{$photo->id}})">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@else
    <p class="text text-dark">No attached media found.</p>
@endif
