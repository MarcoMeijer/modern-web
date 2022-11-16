<x-site-layout title="List of threads on this forum">

    <ul class="list-disc pl-5">
        @foreach($threads as $thread)
        <li>
            <a href="{{route('threads.show', $thread->id)}}">
                <span class="font-semibold">{{$thread->title}}</span>
            </a>
        </li>
        @endforeach
    </ul>

</x-site-layout>