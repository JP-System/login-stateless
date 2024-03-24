<?php

use App\Livewire\Forms\LoginForm;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended('/dashboard', true);
};

?>

<x-content>
    <form wire:submit="login" class="space-y-4">
        <x-input wire:model="form.email" label="E-mail" placeholder="E-mail" />

        <x-password wire:model="form.password" label="Senha" placeholder="Senha" />

        <div class="block mt-4">
            <x-checkbox wire:model="form.remember" right-label="Remember me" />
        </div>

        <x-button type="submit" label="Acessar" full />
    </form>
</x-content>
