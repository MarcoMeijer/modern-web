<x-site-layout title="Read {{$post->title}}">

    <ul class="list-disc pl-5">
        @foreach($post->comments as $comment)
        <li>
            <span class="font-semibold">{{$comment->body}}</span>
        </li>
        @endforeach
    </ul>
</x-site-layout>