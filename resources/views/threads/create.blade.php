<x-site-layout title="New thread for {{$topic->name}}" page="Forum">
    <div class="flex flex-col bg-white rounded-md shadow-lg p-5 m-2">
        <x-form method="post" route="{{route('topics.threads.store', $topic->id)}}" title="New thread" submit="Create">
            <x-form-input name="title" label="Title" :errors="$errors" value="" />
            <x-form-trix-field name="body" label="Body" :errors="$errors" value="" />

            <input type="hidden" id="topic_id" name="topic_id" value="{{$topic->id}}">
        </x-form>
    </div>
</x-site-layout>