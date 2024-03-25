<?php

use Livewire\Volt\Volt;
use Tests\TestCase;
use Tests\User;

uses(TestCase::class);

test('it should render the login screen', function () {
    $response = $this->get('/login');

    $response->assertOk()->assertViewIs('login-stateless::page');
});

test('it should authenticate the master user', function () {
    $user = User::factory()->create(['email' => $this->master]);

    $component = Volt::test('login')
        ->set('form.email', $user->email)
        ->set('form.password', 'password');

    $component->call('login');

    $this->assertAuthenticatedAs($user);

    $component->assertHasNoErrors()->assertRedirect('/dashboard');
});

test('it should block unauthorized users', function () {
    $user = User::factory()->create();

    $component = Volt::test('login')
        ->set('form.email', $user->email)
        ->set('form.password', 'password');

    $component->call('login');

    $this->assertGuest();

    $component->assertHasErrors(['form.email' => [trans('auth.failed')]]);
});

test('it should render the dashboard for admin users', function () {
    $user = User::factory()->create(['email' => $this->master]);

    $this->actingAs($user);

    $response = $this->get('/dashboard');

    $response->assertOk()->assertViewIs('login-stateless::page');
});

test('it should block unauthorized users from accessing the dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = $this->get('/dashboard');

    $response->assertForbidden();
});

test('it should logout the authenticated user', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $component = Volt::test('dashboard');

    $component->call('logout');

    $this->assertGuest();

    $component->assertHasNoErrors()->assertRedirect('/login');
});
