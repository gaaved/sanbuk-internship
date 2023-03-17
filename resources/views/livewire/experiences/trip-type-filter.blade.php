<div class="p-6 bg-white text-black space-y-6">
    @foreach($items as $key => $item)
        <label wire:click="setSelected({{ $item->id }})">
            <input type="checkbox" @if(in_array($item->id, $selected)) checked @endif />
            <span>{{ $item->name }}</span>
        </label>
    @endforeach

    <div wire:click="$emit('filterEvent', 'tripType', {{json_encode($selected)}})" class="bg-blue-500 text-white py-2 px-4 text-center">Apply</div>
</div>