<x-login-stateless::content>
    @if (auth()->check())
        <livewire:dashboard />
    @else
        <livewire:login />
    @endif
</x-login-stateless::content>
