<div class="bg-white text-black h-[80vh]">
    <div class="shadow-xl">
        <div class="relative pr-6 pl-6">
            <div class="font-bold text-4xl py-5">Choose Dates</div>
            <button wire:click="$emit('closeModal')">
                <div class="absolute inset-y-11 right-6 flex items-center pl-3">
                    <svg aria-hidden="true" class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </div>
            </button>
        </div>
    </div>

    <div class="relative pr-6 pl-6 pb-6 pt-10">
        <div class="grid grid-cols-5 py-5 rounded-2xl border-[1px] border-gray-200">
            <div class="col-span-2 pl-4 text-xl">
                From
            </div>
            <div class="pr-24px">
                    <input type="date" wire:change="setSelected($event.target.value, '0')" @if(isset($selected[0])) value="{{$selected[0]}}"  @endif />
            </div>
        </div>
    </div>

    <div class="relative pr-6 pl-6 pb-6">
        <div class="grid grid-cols-5 py-5 rounded-2xl border-[1px] border-gray-200">
            <div class="col-span-2 pl-4 text-xl">
                To
            </div>
            <div class="pr-24px">
                    <input type="date" wire:change="setSelected($event.target.value, '1')" @if(isset($selected[1])) value="{{$selected[1]}}"  @endif />
            </div>
        </div>
    </div>

    <div class="absolute inset-x-0 bottom-0">
        <div class="shadow-xl h-20px rotate-180"></div>
        <div class="relative pr-6 pl-6">
            <div class="font-bold text-xl pb-4">
                <button wire:click="$emit('filterEvent', 'packages', {{json_encode($selected)}})" class="bg-blue-500 text-white py-2 px-4 text-center rounded-2xl w-full">
                    Apply filters
                </button>
            </div>
        </div>
    </div>
</div>
