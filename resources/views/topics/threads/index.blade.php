<x-site-layout title="Topic {{$topic->name}}" page="Forum">

    <x-white-box class="flex-col p-6">
        {{ $threads->links() }}
        @foreach($threads as $thread)
        <div class="flex-col flex">
            <div class="flex items-stretch flex-row bg-white border-l border-r border-b border-solid border-slate-200 px-2 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}">
                <div class="flex flex-row items-center">
                    @if ($thread->firstMessage !== null)
                    @if ($thread->firstMessage->author !== null)
                    <x-profile-thumbnail :user="$thread->firstMessage->author" />
                    @endif
                    <div class="flex flex-col mx-1">
                        <a href="{{route('threads.show', $thread->id)}}">
                            <span class="flex font-semibold text-sm text-slate-700">{{Str::limit($thread->title, 70)}}</span>
                        </a>
                        <span class="flex font-serif text-xs text-slate-600">{{$thread->firstMessage->published_at}}</span>
                    </div>
                    @endif
                </div>
                <div class="flex-1"></div>
                <div class="flex flex-col justify-center border-l border-slate-200 px-2 w-48">
                    <span class="flex font-serif text-xs text-slate-600">Replies: {{$thread->n_replies}}</span>
                    <span class="flex font-serif text-xs text-slate-600">Last Message: {{$thread->lastMessage->published_at}}</span>
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