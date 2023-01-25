<section class="flex flex-1 flex-col">
    <header>
        <h2 class="text-lg font-medium text-gray-900">Api keys</h2>
        <p class="mt-1 text-sm text-gray-600">With these api keys you can get access to some of our data in JSON format.</p>
    </header>

    <div class="flex flex-col">
        @foreach(Auth::user()->tokens()->get() as $token)
        <div class="flex flex-row border m-1 items-center">
            <p class="w-48 m-2">
                {{ $token->name }}
            </p>
            <p class="ml-4 flex-1 font-mono text-sm bg-gray-100 p-2 m-1 rounded-md">
                {{ $token->token }}
            </p>
            <form wire:submit.prevent="deleteApiToken({{ $token->id }})">
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
    </form>
</section>