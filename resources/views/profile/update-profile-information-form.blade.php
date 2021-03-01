<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Alterar cadastro') }}
    </x-slot>

    <x-slot name="description">
       
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nome:') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('E-mail') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Alterado com sucesso.') }}
        </x-jet-action-message>

        <x-jet-button class="bg-blue-600 hover:bg-blue-700" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Alterar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
