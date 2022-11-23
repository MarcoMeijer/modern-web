<x-site-layout title="Download">
    <x-white-box class="p-6 flex-col space-y-6">
        <h1 class="flex flex-col items-center text-3xl font-medium text-gray-900">
            Developers
        </h1>
        <div class="flex flex-row justify-center items-center">
            <div class="flex flex-col space-y-4 w-96 m-8">
                <h2 class="flex items-center text-lg font-medium text-gray-900">
                    <img src="{{ URL::to('/') }}/media/sword.png" class="mr-2" style="image-rendering: pixelated;" />
                    Marco Meijer
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Main developer, designer and pixel artist of multiworlds.
                    I started creating games at the age of 9 years, and I started working on this game in 2016.
                    I released a very early version of this game in 2017.
                    After that I restarted this game to improve the code, and get better at pixel art because the game looked like sh*t.
                    I stopped working on this game for a few years to focus on other things, but since december 2021 I started working on it again.
                </p>
            </div>
            <img class="w-64 h-64 rounded shadow-md shadow-neutral-500" src="{{ URL::to('/') }}/media/marco.jpeg" />
        </div>

        <div class="flex flex-row justify-center items-center">
            <img class="w-42 h-64 rounded shadow-md shadow-neutral-500" src="{{ URL::to('/') }}/media/ruben.jpg" />
            <div class="flex flex-col space-y-4 w-96 m-8">
                <h2 class="flex items-center text-lg font-medium text-gray-900">
                    <img src="{{ URL::to('/') }}/media/sapling.png" class="mr-2" style="image-rendering: pixelated;" />
                    Ruben Eekhof
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Helped developing the java client.
                    He joined development in december 2021, and mostly worked on the ingame UI.
                </p>
            </div>
        </div>
    </x-white-box>
</x-site-layout>