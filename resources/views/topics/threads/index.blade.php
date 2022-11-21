<x-site-layout title="Topic {{$topic->name}}">

    <div class="flex-col">
        @foreach($topic->threads as $thread)
        <div class="flex-col flex">
            <div class="flex items-stretch flex-row bg-slate-100 border-l border-r border-b border-solid border-neutral-300 px-2 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}">
                <div class="flex flex-row items-center">
                    <img class="flex h-8 w-8 rounded" src="{{$thread->messages[0]->author->profile->media->first()->getUrl('thumbnail')}}" alt="">
                    <div class="flex flex-col mx-1">
                        <a href="{{route('threads.show', $thread->id)}}">
                            <span class="flex font-semibold text-sm text-slate-800">{{Str::limit($thread->title, 70)}}</span>
                        </a>
                        @if(count($thread->messages) > 0)
                        <span class="flex font-serif text-xs text-slate-700">{{$thread->messages[0]->published_at}}</span>
                        @endif
                    </div>
                </div>
                <div class="flex-1"></div>
                <div class="flex flex-col justify-center border-l border-neutral-300 px-2 w-24">
                    <span class="flex font-serif text-xs text-slate-700">Replies: {{count($thread->messages) - 1}}</span>
                </div>
            </div>
        </div>
        @endforeach
        <form method="GET" action="{{ route('topics.threads.create', $topic->id) }}">
            <x-button class="m-1">
                Create thread
            </x-button>
        </form>
    </div>
</x-site-layout>