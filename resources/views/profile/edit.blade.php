<x-site-layout>
    <x-white-box>
        <div class="flex flex-1 m-4 max-w-md lg:max-w-3xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </x-white-box>

    <x-white-box>
        <div class="flex flex-1 m-4 max-w-md lg:max-w-3xl">
            @include('profile.partials.update-password-form')
        </div>
    </x-white-box>

    <x-white-box>
        <div class="flex flex-1 m-4 max-w-md lg:max-w-3xl">
            <livewire:api-tokens />
        </div>
    </x-white-box>

    <x-white-box>
        <div class="flex flex-1 m-4 max-w-md lg:max-w-3xl">
            @include('profile.partials.delete-user-form')
        </div>
    </x-white-box>
</x-site-layout>