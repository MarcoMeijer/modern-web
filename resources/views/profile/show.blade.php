<x-site-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">

                <header>
                    <img class="shadow-md h-32 w-32 rounded" src="{{$user->profile->media->first()?->getUrl('big')}}" alt="">
                    <h2 class="text-lg font-medium text-gray-900">{{ $user->username }}</h2>
                    <p class="mt-1 text-sm text-gray-600">{{ $user->profile->bio }}</p>
                </header>
            </div>
        </div>
    </div>
</x-site-layout>