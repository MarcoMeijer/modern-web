<x-site-layout title="Topic {{$topic->name}}">

    <x-white-box class="flex-col p-6">
        @foreach($topic->threads as $thread)
        <div class="flex-col flex">
            <div class="flex items-stretch flex-row bg-white border-l border-r border-b border-solid border-neutral-300 px-2 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}">
                <div class="flex flex-row items-center">
                    <img class="flex h-8 w-8 rounded" src="{{$thread->messages[0]->author->profile->getImageUrl('thumbnail')}}" alt="">
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
        @if(Auth::user() !== null)
        <form method="GET" action="{{ route('topics.threads.create', $topic->id) }}">
            <x-primary-button class="m-1">
                Create thread
            </x-primary-button>
        </form>
        @endif
    </x-white-box>
</x-site-layout>