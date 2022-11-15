<x-site-layout title="Topic {{$topic->name}}">

    <ul class="flex-col">
        @foreach($topic->posts as $post)
        <li class="flex-col flex">
            <div class="flex items-stretch flex-row bg-slate-100 border-l border-r border-b border-solid border-neutral-300 px-2 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}">
                <div class="flex flex-row items-center">
                    <img class="flex h-8 w-8 rounded" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                    <div class="flex flex-col mx-1">
                        <a href="{{route('posts.show', $post->id)}}">
                            <span class="flex font-semibold text-sm text-slate-600">{{Str::limit($post->title, 70)}}</span>
                        </a>
                        <span class="flex font-serif text-xs text-slate-500">{{$post->comments[0]->published_at}}</span>
                    </div>
                </div>
                <div class="flex-1"></div>
                <div class="flex flex-col justify-center border-l border-neutral-300 px-2 w-24">
                    <span class="flex font-serif text-xs text-slate-500">Comments: {{count($post->comments)}}</span>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</x-site-layout>