<div>
    <form wire:submit.prevent="save">
        {{ dump($avatar) }}
        @if(0)
            @if($avatar)
                <img src="{{$avatar->temporaryUrl()}}" alt="" width="100" height="100">
                <br>
            @endif
        @endif

        <input type="file" name="avatar" wire:model="avatar">
        @error('avatar') <span class="error">{{ $message }}</span> @enderror

        <br>
        <br>
        <br>
        <button type="submit">Save</button>
    </form>
</div>
