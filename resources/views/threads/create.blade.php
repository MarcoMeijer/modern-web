<x-site-layout title="New thread for {{$topic->name}}">
    <div class="flex flex-col bg-white rounded-md shadow-lg p-5 m-2">
        <x-form method="post" route="{{route('topics.threads.store', $topic->id)}}" title="New thread" submit="Create">
            <div class="my-2 flex flex-col">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" name="title" value="{!! old('title', '') !!}" />
                <x-input-error class="mt-2" :messages="$errors->get('title')" />
            </div>

            <div class="my-2">
                <x-input-label for="body" :value="__('Body')" />
                <x-trix-field id="body" name="body" value="{!! old('body', '') !!}" />
                <x-input-error class="mt-2" :messages="$errors->get('body')" />
            </div>

            <input type="hidden" id="topic_id" name="topic_id" value="{{$topic->id}}">
        </x-form>
    </div>
</x-site-layout>