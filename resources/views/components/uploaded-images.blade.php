<h3>Uploaded Images</h3>
@if(!$post->media->isEmpty())
<div class="uploaded-images">
    <div class="card">
        <div class="card-body">
            @foreach($post->media as $key => $photo)
            <div class="item-wrapper d-flex align-items-top @if (!$loop->first) border-top @endif">

                <img src="{{ $photo->getUrl('thumbnail') }}" width="100" height="100" class="img-thumbnail">

                <div class="meta">
                    <p class="card-text m-0 text-dark">{{$photo->mime_type}}</p>
                    <p class="card-text m-0 text-dark">{{ number_format( $photo->size / 1024, 2) }} KB</p>
                </div>

                <div class="extras">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <p class="text text-dark">{{ $photo->name }}</p>
                    </div>
                    <a href="#" class="close" wire:click="confirmRemoveMedia({{$photo->id}})" data-toggle="modal" data-target="#ImageDelete">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div wire:ignore.self class="modal fade" id="ImageDelete" tabindex="-1" role="dialog" aria-labelledby="ImageDeleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ImageDeleteModal">Delete Confirm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="removeMedia()" class="btn btn-danger close-modal" data-dismiss="modal">Yes, Delete</button>
            </div>
        </div>
    </div>
</div>
@else
<p class="text text-dark">No attached media found.</p>
@endif
