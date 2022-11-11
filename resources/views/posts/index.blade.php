<x-site-layout title="List of posts on this forum">

    <ul class="list-disc pl-5">
        @foreach($posts as $post)
        <li>
            <a href="{{route('posts.show', $post->id)}}">
                <span class="font-semibold">{{$post->title}}</span>
                <span class="text-sm">{{ Str::limit($post->body, 80)}}</span>
            </a>
        </li>
        @endforeach
    </ul>

</x-site-layout>