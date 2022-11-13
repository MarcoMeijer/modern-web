<x-site-layout title="List of topics on this forum">

    <ul class="list-disc pl-5">
        @foreach($topics as $topic)
        <li>
            <a href="{{route('topics.show', $topic->id)}}">
                <span class="font-semibold">{{$topic->name}}</span>
            </a>
        </li>
        @endforeach
    </ul>

</x-site-layout>