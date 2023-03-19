<div class="space-y-16px">
    <div class="pt-16px">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <x-forms.inputs.text-input placeholder="Search" wire-model="search" class="block w-full p-4 pl-10 rounded-md
            focus:ring-blue-500 focus:border-blue-500 text-xl"/>
        </div>
    </div>
    <div class="flex flex-row gap-16px">
        <div class="flex items-center">
            <button wire:click="$emit('openModal', 'experiences.trip-type-filter')" class="bg-gray-100 font-medium py-3 px-4 rounded-2xl border-[1px] border-gray-400 text-gray-400">Trip type</button>
        </div>
        <div class="flex items-center">
            <button wire:click="$emit('openModal', 'experiences.dates-filter')" class="bg-gray-100 font-medium py-3 px-4 rounded-2xl border-[1px] border-gray-400 text-gray-400">Date</button>
        </div>
        <div class="flex items-center">
            <button wire:click="$emit('openModal', 'experiences.departure-filter')" class="bg-gray-100 font-medium py-3 px-4 rounded-2xl border-[1px] border-gray-400 text-gray-400">Departure</button>
        </div>
        <div class="flex items-center">
            <button wire:click="$emit('openModal', 'experiences.boat-type-filter')" class="bg-gray-100 font-medium py-3 px-4 rounded-2xl border-[1px] border-gray-400 text-gray-400">Boat type</button>
        </div>
    </div>
    <div class="drop-shadow-md">
    <hr class=" h-px my-8 bg-gray-200 border-1 drop-shadow-md">
    </div>
    <div class="mt-8 space-y-12 pt-16px">
    @foreach ($experiences as $experience)
        <div>
            <div class="border-solid h-300px ">
                <img src="{{$experience->experienceImages->first()->url}}" class="h-300px w-full object-cover rounded-2xl">
            </div>
            <div class="pt-24px">
            <div class="grid grid-cols-2 gap-16px">
                <div class="font-bold text-xl">{{ $experience->name }}</div>
                <div class="grid grid-cols-2">
                <div class="col-start-1 col-end-3 text-2xl text-right text-gray-500">from</div>
                <div class="col-end-7 col-span-2 pl-4px font-semibold text-2xl text-regal-blue">{{ $experience->packages->where('status', 1)->first()->price }} KD</div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-16px pt-4px">
                <div class="text-gray-500">{{$experience->vendor->name}}</div>
                <div class="text-right text-gray-500">max 6 people</div>
            </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
