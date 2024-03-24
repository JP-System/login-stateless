<?php

use Tests\TestCase;
use Livewire\Volt\Volt;

uses(TestCase::class);

test('it should render the login screen', function () {
    $response = $this->get('/login');

    $response->assertOk()->assertSeeVolt('auth.login');
});

test('it should authenticate the master user', function () {
    $user = $this->user();

    $component = Volt::test('auth.login')
        ->set('form.email', $this->master->email)
        ->set('form.password', config('system.master.password'));

    $component->call('login');

    $this->assertAuthenticatedAs($this->master);

    $component->assertHasNoErrors()->assertRedirect('/dashboard');
});

test('it should block unauthorized users', function () {
    $user = $this->user();

    $component = Volt::test('auth.login')
        ->set('form.email', $user->email)
        ->set('form.password', 'password');

    $component->call('login');

    $this->assertGuest();

    $component->assertHasErrors(['form.email' => [trans('auth.failed')]]);
});

test('it should render the dashboard for admin users', function () {
    $this->actingAs($this->master);

    $response = $this->get('/dashboard');

    $response->assertOk()->assertSeeVolt('dashboard.index');
});

test('it should block unauthorized users from accessing the dashboard', function () {
    $user = $this->user();

    $this->actingAs($user);

    $response = $this->get('/dashboard');

    $response->assertForbidden();
});

test('it should logout the authenticated user', function () {
    $this->actingAs($this->master);

    $component = Volt::test('dashboard.index');

    $component->call('logout');

    $this->assertGuest();

    $component->assertHasNoErrors()->assertRedirect('/');
});
