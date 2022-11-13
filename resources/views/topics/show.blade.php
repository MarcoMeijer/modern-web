<x-site-layout title="Topic {{$topic->name}}">

    <ul class="list-disc pl-5">
        @foreach($topic->posts as $post)
        <li>
            <a href="{{route('posts.show', $post->id)}}">
                <span class="font-semibold">{{$post->title}}</span>
            </a>
        </li>
        @endforeach
    </ul>
</x-site-layout>