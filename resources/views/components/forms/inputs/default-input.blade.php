<div>
    <label>
        <input type="{{ $type }}"
               class="bg-gray-100 p-18px {{ $class }}"
               placeholder="{{ $placeholder }}"
               @if($wireModel) wire:model="{{ $wireModel }}" @endif
        />
    </label>
    @if($wireModel)
        @error($wireModel)<span class="error text-red-500 mt-4">{{ $message }}</span> @enderror
    @endif
</div>
