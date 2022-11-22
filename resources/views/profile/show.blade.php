<x-site-layout>
    <x-white-box class="flex-row">
        <div class="flex border-r border-slate-200 p-2">
            <x-profile-badge :user="$user" />
        </div>
        <div class="flex flex-col p-2">
            <h2 class="text-lg font-medium text-gray-900">Bio</h2>
            <p class="mt-1 text-sm text-gray-600">{!! $user->profile->bio !!}</p>
        </div>
    </x-white-box>
</x-site-layout>