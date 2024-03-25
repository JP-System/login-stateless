<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Login Stateless') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @livewireStyles
    {!! LoginStateless\Facades\Asset::css() !!}

    <!-- Scripts -->
    @wireUiScripts
</head>

<body class="h-full font-sans antialiased bg-secondary-200 dark:bg-secondary-700">
    <div class="flex flex-col items-center justify-center min-h-full pt-12">
        <x-login-stateless::image-logo class="w-20 h-20 fill-current text-primary-700" />

        <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-[420px]">
            <x-card padding="p-6">
                {{ $slot }}
            </x-card>
        </div>
    </div>
</body>

</html>
