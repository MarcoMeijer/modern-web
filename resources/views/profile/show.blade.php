<x-site-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="flex flex-row p-2 bg-white shadow sm:rounded-lg">

                <div class="flex border-r border-slate-200 p-2">
                    <x-profile-badge :user="$user" />
                </div>
                <div class="flex flex-col p-2">
                    <h2 class="text-lg font-medium text-gray-900">Bio</h2>
                    <p class="mt-1 text-sm text-gray-600">{!! $user->profile->bio !!}</p>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>