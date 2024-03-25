<?php

use LoginStateless\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();

    $this->redirect('/login', true);
};

?>

<div class="h-full">
    <div class="flex justify-center pb-4 text-xl text-secondary-900">
        {{ trans('Você está logado!') }}
    </div>

    <div class="space-y-4">
        <x-button href="/pulse" label="Pulse" color="fuchsia" target="_blank" full />

        <x-button href="/horizon" label="Horizon" color="indigo" target="_blank" full />

        <x-button href="/log-viewer" label="Log Viewer" color="blue" target="_blank" full />
    </div>

    @if (auth()->check())
        @include('login-stateless::components.actions')
    @endif
</div>
