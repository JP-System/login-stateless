<div class="flex min-h-full flex-col justify-center items-center pt-12">
    <x-image-logo class="w-20 h-20 fill-current text-teal-700" />

    <div class="mt-6 sm:mx-auto sm:w-full sm:max-w-[480px]">
        <x-card padding="p-6">
            {{ $slot }}
        </x-card>
    </div>
</div>
