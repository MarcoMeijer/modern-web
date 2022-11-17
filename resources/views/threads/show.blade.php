<x-site-layout title="Read {{$thread->title}}">

    <ul class="flex flex-col">
        @foreach($thread->messages as $message)
        <li class="flex flex-row bg-slate-100 rounded-md shadow-lg p-1 m-2">
            <class class="flex flex-col w-48 items-center border-r border-slate-300 p-4">
                <img class="h-32 w-32 rounded border-2 border-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                <span class="font-semibold">{{$message->author->name}}</span>
                <span class="text-xs text-slate-500 p-1 text-center border-t border-slate-200">Member since <br /> {{$message->author->email_verified_at}}</span>
                <span class="text-xs text-slate-500 m-1">Messages posted: {{count($message->author->messages)}}</span>
            </class>
            <class class="flex flex-col flex-1 p-2">
                <span class="flex">{{$message->body}}</span>
                <div class="flex flex-1"></div>
                <div class="flex border-t border-slate-200 mx-2 pt-1">
                    <span class="flex flex-initial font-serif text-xs text-slate-400">Posted at {{$message->published_at}}</span>
                    <div class="flex flex-1"></div>
                    <span class="flex flex-initial font-serif text-xs text-slate-400">#{{$loop->index + 1}}</span>
                </div>
            </class>
        </li>
        @endforeach
        <li class="flex flex-col bg-slate-100 rounded-md shadow-lg p-2 m-2">
            <x-form method="post" route="{{route('messages.store', $thread->id)}}" title="New reply" submit="reply">
                <x-form-text-area name="body" label="Body" placeholder="Enter text here..." :errors="$errors" value="" />
                <input type="hidden" id="thread_id" name="thread_id" value="{{$thread->id}}">
            </x-form>
        </li>
    </ul>
</x-site-layout>