<x-site-layout title="Topics">

    <x-white-box class="flex-col p-6">
        @foreach($topics as $topic)
        <div class="flex-col flex">
            <div class="flex items-stretch flex-row bg-white border-l border-r border-b border-solid border-slate-200 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}">
                <div class="flex flex-col justify-center pl-2">
                    <a href="{{route('topics.threads.index', $topic->id)}}">
                        <span class="flex font-semibold text-slate-700">{{$topic->name}}</span>
                    </a>
                    <span class="flex font-serif text-xs text-slate-600">{{$topic->description}}</span>
                </div>
                <div class="flex-1"></div>
                <div class="flex flex-row items-center border-l border-slate-200 px-2 w-72">
                    @if($topic->lastThread !== null && count($topic->lastThread->messages) > 0)
                    <img class="flex h-8 w-8 rounded" src="{{$topic->lastThread->messages[0]->author->profile->getImageUrl('thumbnail')}}" alt="">
                    <div class="flex flex-col mx-1">
                        <a href="{{route('threads.show', $topic->lastThread->id)}}">
                            <span class="flex font-serif text-sm text-slate-600">{{Str::limit($topic->lastThread->title, 30)}}</span>
                        </a>
                        <span class="flex font-serif text-xs text-slate-500">{{$topic->lastThread->messages[0]->published_at}}</span>
                    </div>
                    @endif
                </div>
                <div class="flex flex-col justify-center border-l border-slate-200 px-2 w-24">
                    <span class="flex font-serif text-xs text-slate-600">Threads: {{count($topic->threads)}}</span>
                    <span class="flex font-serif text-xs text-slate-600">Messages: {{count($topic->messages)}}</span>
                </div>

                @if(Auth::user() !== null && Auth::user()->isAdmin())
                <div class="flex flex-col items-center justify-center border-l border-slate-200 px-2 w-10">
                    <form method="POST" action="{{ route('topics.destroy', $topic->id) }}">
                        @csrf
                        @method('delete')
                        <button type="submit">
                            <x-trash-icon class="flex fill-slate-500 w-4 h-4" />
                        </button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @endforeach

        @if(Auth::user() !== null && Auth::user()->isAdmin())
        <form method="GET" action="{{ route('topics.create') }}">
            <x-primary-button class="m-1">
                Create topic
            </x-primary-button>
        </form>
        @endif
    </x-white-box>

</x-site-layout>