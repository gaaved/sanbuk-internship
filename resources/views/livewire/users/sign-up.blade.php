<div class="space-y-16px">
    <h1 class="text-center font-bold text-24px">Sign Up</h1>

    <form wire:submit.prevent="submit" class="space-y-16px">
        <div class="grid grid-cols-2 gap-16px">
            <x-forms.inputs.text-input placeholder="First Name" class="w-full" wire-model="first_name" />
            <x-forms.inputs.text-input placeholder="Last Name" class="w-full" wire-model="last_name" />
        </div>

        <x-forms.inputs.text-input placeholder="Phone" class="w-full" wire-model="phone" />
        <x-forms.inputs.text-input placeholder="Email" class="w-full" wire-model="email" />

        <div class="flex justify-center">
            <x-forms.buttons.default-button title="Next" type="submit" class="px-65px" :disabled="$isButtonDisabled" />
        </div>
    </form>
</div>
