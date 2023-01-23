<x-site-layout title="Shop" page="Shop">
    <x-white-box class="p-6 flex-col space-y-6 items-center">
        <div class="flex flex-row justify-center items-center">
            <h2 class="flex items-center text-lg font-medium text-gray-900">
                <img src="{{ URL::to('/') }}/media/mana_crystal_blue.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_green.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_red.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_yellow.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_purple.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                Buy mana crystals
                <img src="{{ URL::to('/') }}/media/mana_crystal_purple.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_yellow.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_red.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_green.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
                <img src="{{ URL::to('/') }}/media/mana_crystal_blue.png" class="ml-1 mr-1" style="image-rendering: pixelated;" />
            </h2>
        </div>
        <div class="flex flex-row">
            <x-crystals />
            <p class="w-80 ml-4">
                Mana crystals are the main currency of multiworlds.
                They can be used to buy items from the store like clothing, blocks and most importantly world crystals.
                Though these crystals can be earned by just playing the game, you can buy some here to support the developers.
            </p>
        </div>
        <p class="font-bold w-[40rem]">
            IMPORTANT: The game is currently still early in development.
            This means that the server sometimes resets between updates.
            But that doesn't mean it is not worth buying these crystals,
            because we remember the purchases that are made between resets.
            For example if you buy 5,000 mana crystals before a reset.
            You will start over with 5,000 mana crystals after the reset.
        </p>
    </x-white-box>
</x-site-layout>