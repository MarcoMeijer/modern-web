<div class="flex flex-col pb-2 border-b border-slate-400">
    <div class="flex flex-row items-center space-x-4">
        <img src="{{ URL::to('/') }}{{ $crystal['icon'] }}" class="mx-1" style="image-rendering: pixelated;" />
        <p class="w-72">{{ $crystal['name'] }}</p>
        <x-primary-button href="" class="w-24 justify-center" wire:click="toggle">
            € {{ $crystal['price'] }}
        </x-primary-button>
    </div>
    @if($open)
    <x-form method="post" route="{{ route('prepare-payment', ['amount' => $crystal['amount']]) }}" title="Buy {{ $crystal['name' ]}}" submit="Buy">
        <x-form-input name="username" label="Username" :errors="$errors" value="" />
        <input type="hidden" id="amount" name="amount" value="{{ $crystal['amount'] }}">
    </x-form>
    @endif
</div>