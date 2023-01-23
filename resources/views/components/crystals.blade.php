<div class="flex flex-col space-y-3">
    @foreach($crystals as $crystal)
    <div class="flex flex-row items-center space-x-4">
        <img src="{{ URL::to('/') }}{{ $crystal['icon'] }}" class="mx-1" style="image-rendering: pixelated;" />
        <p class="w-48">{{ $crystal['name'] }}</p>
        <form action="{{ route('prepare-payment', ['amount' => $crystal['amount']]) }}">
            <x-primary-button href="" class="w-24 justify-center">
                € {{ $crystal['price'] }}
            </x-primary-button>
        </form>
    </div>
    @endforeach
</div>