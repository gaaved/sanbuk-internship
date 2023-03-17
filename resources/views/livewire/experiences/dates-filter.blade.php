<div class="p-6 bg-white text-black space-y-6">
        <div class="flex items-center">
            <div class="relative">
                <input id="2" name="1" type="date" wire:change="setSelected($event.target.value, '0')" />
            </div>
            <span class="mx-4 text-gray-500">to</span>
            <div class="relative">
                <input id="1" name="2" type="date" wire:change="setSelected($event.target.value, '1')" />
            </div>
        </div>

<div wire:click="$emit('filterEvent', 'packages', {{json_encode($selected)}})" class="bg-blue-500 text-white py-2 px-4 text-center">Apply</div>

</div>

