<div>
    <input type="text" wire:model.lazy="name">
    <br>
    <input type="checkbox" wire:model="loud">
    <br>
    <select wire:model="greeting" multiple>
        <option>Hello</option>
        <option>Namaste</option>
        <option>Kem cho?</option>
    </select>
    <br>
    {{ implode(', ', $greeting) }} {{ $name }} @if($loud) ! @endif
    <br>
    {{-- <button wire:click="resetName($event.target.innerText)">Reset Name</button> --}}
    {{-- <button wire:mouseenter="resetName('Devashya Patel')">Reset Name</button> --}}

    {{-- <form action="#" wire:submit.prevent="$set('name', 'Taral Patel')"> --}}
    <form action="#" wire:submit.prevent="resetName('Nehal Patel')">
        <button>Reset Name</button>
    </form>
</div>
