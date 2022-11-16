<x-site-layout title="New thread for {{$topic->name}}">
    <x-form method="post" route="{{route('topics.threads.store', $topic->id)}}" title="New thread" submit="Create">
        <x-form-input name="title" label="Title" placeholder="Enter the title of your post here..." :errors="$errors" value="" />
        <x-form-text-area name="body" label="Body" placeholder="Enter text here..." :errors="$errors" value="" />
        <input type="hidden" id="topic_id" name="topic_id" value="{{$topic->id}}">
    </x-form>
</x-site-layout>