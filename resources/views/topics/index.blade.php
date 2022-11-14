<x-site-layout title="List of topics on this forum">

    <ul class="flex-col">
        @foreach($topics as $topic)
        <li class="flex-col flex">
            <a
                class="flex-row bg-slate-100 border-l border-r border-b border-solid border-neutral-300 p-2 {{ $loop->index == 0 ? 'border-t' : ''}}"
                href="{{route('topics.show', $topic->id)}}"
            >
                <span class="font-semibold">{{$topic->name}}</span>
            </a>
        </li>
        @endforeach
    </ul>

</x-site-layout>