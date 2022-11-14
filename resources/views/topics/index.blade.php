<x-site-layout title="Topics">

    <ul class="flex-col">
        @foreach($topics as $topic)
        <li class="flex-col flex">
            <a
                class="flex items-stretch flex-row bg-slate-100 border-l border-r border-b border-solid border-neutral-300 px-2 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}"
                href="{{route('topics.show', $topic->id)}}"
            >
                <div class="flex flex-initial flex-col justify-center">
                    <span class="flex font-semibold text-slate-800">{{$topic->name}}</span>
                    <span class="flex font-serif text-xs text-slate-500">{{$topic->description}}</span>
                </div>
                <div class="flex-1"></div>
                <div class="flex flex-initial flex-col justify-center border-l border-neutral-300 px-2 w-64">
                    <span class="flex flex-initial font-serif text-sm text-slate-500">{{Str::limit($topic->posts[0]->title, 30)}}</span>
                    <span class="flex flex-initial font-serif text-xs text-slate-400">{{$topic->posts[0]->comments[0]->published_at}}</span>
                </div>
                <div class="flex flex-initial flex-col justify-center border-l border-neutral-300 px-2 w-24">
                    <span class="flex flex-initial font-serif text-xs text-slate-500">Posts: {{count($topic->posts)}}</span>
                    <span class="flex flex-initial font-serif text-xs text-slate-500">Comments: {{count($topic->comments)}}</span>
                </div>
            </a>
        </li>
        @endforeach
    </ul>

</x-site-layout>