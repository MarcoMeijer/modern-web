<x-site-layout title="Welcome" page="Welcome">
    <x-white-box class="p-6 flex-col space-y-6">
        <div class="flex flex-row justify-center items-center">
            <div class="flex flex-col space-y-4 w-96 m-8">
                <h2 class="flex items-center text-lg font-medium text-gray-900">
                    <x-application-logo class="mr-2" />
                    MultiWorlds
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    MultiWorlds is a mmo game where you can gather resources and make your own worlds.
                    The main focus of this game is to give players the tools to create their own things, and instantly share it with other players.
                    Or checking out the worlds that other players have created.
                </p>
            </div>
            <img class="w-[114] h-64 rounded shadow-md shadow-neutral-500" src="https://img.itch.zone/aW1hZ2UvMTU3MjA5Mi85MTgwMTY1LnBuZw==/original/pHaJqy.png" />
        </div>

        <div class="flex flex-row justify-center items-center">
            <img class="w-[114] h-64 rounded shadow-md shadow-neutral-500" src="https://img.itch.zone/aW1hZ2UvMTU3MjA5Mi85MTgwMTY0LnBuZw==/original/7slLQa.png" />
            <div class="flex flex-col space-y-4 w-96 m-8">
                <h2 class="flex items-center text-lg font-medium text-gray-900">
                    <img src="{{ URL::to('/') }}/media/pickaxe.png" class="mr-2" style="image-rendering: pixelated;" />
                    Current features
                </h2>
                <ul class="list-disc text-sm text-gray-600 ml-4">
                    <li>Multiplayer</li>
                    <li>Platformer mechanics</li>
                    <li>Crafting system</li>
                    <li>Ownership system using crystals (claiming areas)</li>
                    <li>Enemies and combat *</li>
                    <li>Fully customizable character *</li>
                    <li>Over 100 items/blocks</li>
                    <li>100% guarantee of fixing all your problems **</li>
                </ul>
                <p class="mt-1 text-xs text-gray-400">
                    * Will be part of the next update <br />
                    ** Not guaranteed
                </p>
            </div>
        </div>

        <div class="flex flex-row justify-center items-center">
            <div class="flex flex-col space-y-4 w-96 m-8">
                <h2 class="flex items-center text-lg font-medium text-gray-900">
                    <img src="{{ URL::to('/') }}/media/sign.png" class="mr-2" style="image-rendering: pixelated;" />
                    Community
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    This website has a forum where you can discuss things about the game or make suggestions.
                    If you are interested in our game you can also join our <a class="text-cyan-600 underline" href="https://discord.gg/AJvVWXTWKf">discord server</a> for more updates.
                </p>

                <p class="mt-1 text-sm text-gray-600">
                    This game is currently in the "pre-alpha" phase and may contain some bugs. All worlds/items may be reset in a next update.
                </p>
            </div>
            <img class="w-[114] h-64 rounded shadow-md shadow-neutral-500" src="https://img.itch.zone/aW1hZ2UvMTU3MjA5Mi85MTgwMTY1LnBuZw==/original/pHaJqy.png" />
        </div>
    </x-white-box>
</x-site-layout>