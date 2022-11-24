<x-site-layout title="New topic" page="Forum">
    <div class="flex flex-col bg-white rounded-md shadow-lg p-5 m-2">
        <x-form method="post" route="{{route('topics.store')}}" title="New topic" submit="Create">
            <x-form-input name="name" label="Name" :errors="$errors" value="" />
            <x-form-input name="description" label="Description" :errors="$errors" value="" />
        </x-form>
    </div>
</x-site-layout>