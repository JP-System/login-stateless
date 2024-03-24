<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/', navigate: true);
};

?>

<x-content>
    <div class="pb-4 text-gray-90 text-xl flex justify-center">
        {{ trans('Você está logado!') }}
    </div>

    <div class="space-y-4">
        <x-button href="/pulse" label="Pulse" color="fuchsia" target="_blank" full />

        <x-button href="/horizon" label="Horizon" color="indigo" target="_blank" full />

        <x-button href="/log-viewer" label="Log Viewer" color="blue" target="_blank" full />
    </div>

    @if (auth()->check())
        @include('components.actions')
    @endif
</x-content>
