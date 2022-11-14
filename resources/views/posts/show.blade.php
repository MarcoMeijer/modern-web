<x-site-layout title="Read {{$post->title}}">

    <ul class="flex flex-col">
        @foreach($post->comments as $comment)
        <li class="flex flex-row bg-slate-200 rounded-md shadow-lg p-1 m-2">
            <class class="flex flex-col w-72 items-center border-r border-slate-300 p-4">
                <img class="h-32 w-32 rounded border-2 border-white"
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt="">
                <span class="font-semibold">{{$comment->author->name}}</span>
                <span class="text-xs text-slate-500 p-1 text-center border-t border-slate-300">Member since <br/> {{$comment->author->email_verified_at}}</span>
                <span class="text-xs text-slate-500 m-1">Comments: {{count($comment->author->comments)}}</span>
            </class>
            <class class="flex flex-col p-2">
                <span class="flex">{{$comment->body}}</span>
                <div class="flex flex-1"></div>
                <div class="flex justify-end border-t border-slate-300 mx-2 pt-1">
                    <span class="flex flex-initial font-serif text-xs text-slate-500">Posted at {{$comment->published_at}}</span>
                </div>
            </class>
        </li>
        @endforeach
    </ul>
</x-site-layout>