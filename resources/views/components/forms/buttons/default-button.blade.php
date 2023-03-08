<div>
    <button
        class="p-16px @if($disabled) bg-gray-300 @else bg-blue-500 @endif btn {{ $class }}"
        @if($type) type="{{ $type }}" @endif
        @if($disabled) disabled @endif
    >
        {{ $title }}
    </button>
</div>
