<div class="absolute bottom-8 right-8">
    <x-dropdown>
        <x-slot name="trigger">
            <x-mini-button icon="user" rounded xl />
        </x-slot>

        <x-dropdown.item wire:click="logout" label="Logout" icon="arrow-left-start-on-rectangle" />
    </x-dropdown>
</div>
