<x-site-layout title="Read {{$thread->title}}">

    <ul class="flex flex-col">
        @foreach($thread->messages as $message)
        <li class="flex flex-row bg-white rounded-md shadow-lg p-1 m-2">
            <class class="flex border-r border-slate-200 p-4">
                <x-profile-badge :user="$message->author" />
            </class>
            <class class="flex flex-col flex-1 p-2">
                <span class="flex">{{$message->body}}</span>
                <div class="flex flex-1"></div>
                <div class="flex border-t border-slate-100 mx-2 pt-1">
                    <span class="flex flex-initial font-serif text-xs text-slate-400">Posted at {{$message->published_at}}</span>
                    <div class="flex flex-1"></div>
                    <span class="flex flex-initial font-serif text-xs text-slate-300">#{{$loop->index + 1}}</span>
                </div>
            </class>
        </li>
        @endforeach
        <li class="flex flex-col bg-white rounded-md shadow-lg p-5 m-2">
            <x-form method="post" route="{{route('messages.store', $thread->id)}}" title="New reply" submit="reply">
                <x-form-text-area name="body" label="Body" placeholder="Enter text here..." :errors="$errors" value="" />
                <input type="hidden" id="thread_id" name="thread_id" value="{{$thread->id}}">
            </x-form>
        </li>
    </ul>
</x-site-layout>