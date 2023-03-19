<div class="bg-white text-black h-[80vh]">
    <div class="shadow-xl">
        <div class="relative pr-6 pl-6">
            <div class="font-bold text-4xl py-5">Choose Boat type</div>
            <button wire:click="$emit('closeModal')">
                <div class="absolute inset-y-11 right-6 flex items-center pl-3">
                    <svg aria-hidden="true" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-2 pr-6 pl-6 py-5">
        <div class="col-start-1 col-end-3 text-xl text-left">Show all</div>
        <div class="col-end-7 col-span-2 pr-24px font-semibold text-2xl">
            <input class="w-4 h-4 mt-2" type="checkbox" wire:click="setAllSelected($event.target.checked)">
        </div>
    </div>

    @foreach($items as $key => $item)
        <div class="relative pr-6 pl-6 pb-6">
            <div class="grid grid-cols-5 py-5 rounded-2xl border-[1px] border-gray-200">
                <div class="col-start-1 pl-20px">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-5-5 35 35" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 bg-blue-500 text-white rounded-xl">
                        <path stroke-linecap="round"
                              stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </div>
                <div class="col-span-3 mt-5px pr-4 text-xl">
                    {{$item->name}}
                </div>
                <div class="col-end-7 col-span-1 pr-24px font-semibold">
                    <label wire:click="setSelected({{ $item->id }})">
                        <input class="w-4 h-4 mt-12px" type="checkbox" @if(in_array($item->id, $selected)) checked @endif >
                    </label>
                </div>
            </div>
        </div>
    @endforeach
    <div class="absolute inset-x-0 bottom-0">
        <div class="shadow-xl h-20px rotate-180"></div>
        <div class="relative pr-6 pl-6">
            <div class="font-bold text-xl pb-4">
                <button wire:click="$emit('filterEvent', 'type', {{json_encode($selected)}})" class="bg-blue-500 text-white py-2 px-4 text-center rounded-2xl w-full">
                    Apply filters
                </button>
            </div>
        </div>
    </div>
</div>
