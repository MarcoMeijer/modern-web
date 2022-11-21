<x-site-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <x-profile-badge :user="$user" />
                <p class="mt-1 text-sm text-gray-600">{{ $user->profile->bio }}</p>
            </div>
        </div>
    </div>
</x-site-layout>