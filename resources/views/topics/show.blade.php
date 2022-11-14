<x-site-layout title="Topic {{$topic->name}}">

    <ul class="flex-col">
        @foreach($topic->posts as $post)
        <li class="flex-col flex">
            <a
                class="flex-row bg-slate-100 border-l border-r border-b border-solid border-neutral-300 p-2 {{ $loop->index == 0 ? 'border-t' : ''}}"
                href="{{route('posts.show', $post->id)}}"
            >
                <span class="font-semibold">{{$post->title}}</span>
            </a>
        </li>
        @endforeach
    </ul>
</x-site-layout>