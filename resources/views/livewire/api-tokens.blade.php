<section class="flex flex-1 flex-col">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Api keys</h2>
        <p class="mt-1 text-sm text-gray-600">With these api keys you can get access to some of our data in JSON format.</p>
    </header>

    <div class="flex flex-col">
        @foreach(Auth::user()->tokens()->get() as $tokena)
        <div class="flex flex-row border m-1 items-center">
            <p class="w-48 m-2">
                {{ $tokena->name }}
            </p>
            <p class="flex-1"></p>
            <form wire:submit.prevent="deleteApiToken({{ $tokena->id }})">
                <x-danger-button class="m-2">Delete</x-danger-button>
            </form>
        </div>
        @endforeach
    </div>

    <form wire:submit.prevent="createApiToken" class="flex self-stretch flex-col mt-6 space-y-6">
        <div>
            <x-input-label for="name" value="Token name" />
            <x-text-input id="name" name="name" class="mt-1 block w-full" required autofocus autocomplete="name" wire:model="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <x-primary-button class="flex self-start">New token</x-primary-button>
        @if($token)
        <p>Your new token is <span class="font-mono bg-gray-200 p-1 rounded">{{ $token }}</span>, please save it <span class="underline">because you won't be able to see it again!</span></p>
        @endif
    </form>
</section>