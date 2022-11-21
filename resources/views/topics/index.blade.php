<x-site-layout title="Topics">

    <ul class="flex-col">
        @foreach($topics as $topic)
        <li class="flex-col flex">
            <div class="flex items-stretch flex-row bg-slate-100 border-l border-r border-b border-solid border-neutral-300 px-2 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}">
                <div class="flex flex-col justify-center">
                    <a href="{{route('topics.threads.index', $topic->id)}}">
                        <span class="flex font-semibold text-slate-800">{{$topic->name}}</span>
                    </a>
                    <span class="flex font-serif text-xs text-slate-700">{{$topic->description}}</span>
                </div>
                <div class="flex-1"></div>
                <div class="flex flex-row items-center border-l border-neutral-300 px-2 w-72">
                    <img class="flex h-8 w-8 rounded" src="{{$topic->threads[0]->messages[0]->author->profile->media->first()->getUrl('thumbnail')}}" alt="">
                    <div class="flex flex-col mx-1">
                        <a href="{{route('threads.show', $topic->threads[0]->id)}}">
                            <span class="flex font-serif text-sm text-slate-700">{{Str::limit($topic->threads[0]->title, 30)}}</span>
                        </a>
                        @if(count($topic->threads[0]->messages) > 0)
                        <span class="flex font-serif text-xs text-slate-600">{{$topic->threads[0]->messages[0]->published_at}}</span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col justify-center border-l border-neutral-300 px-2 w-24">
                    <span class="flex font-serif text-xs text-slate-700">Threads: {{count($topic->threads)}}</span>
                    <span class="flex font-serif text-xs text-slate-700">Messages: {{count($topic->messages)}}</span>
                </div>
            </div>
        </li>
        @endforeach
    </ul>

</x-site-layout>