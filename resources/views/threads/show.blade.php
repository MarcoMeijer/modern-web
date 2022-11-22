<x-site-layout title="Read {{$thread->title}}">
    @foreach($thread->messages as $message)
    <x-white-box>
        <class class="flex border-r border-slate-200 p-4">
            <x-profile-badge :user="$message->author" />
        </class>
        <class class="flex flex-col flex-1 p-2">
            <span class="flex">{!! $message->body !!}</span>
            <div class="flex flex-1"></div>
            <div class="flex border-t border-slate-100 mx-2 pt-1">
                <span class="flex flex-initial font-serif text-xs text-slate-400">Posted at {{$message->published_at}}</span>
                <div class="flex flex-1"></div>
                <span class="flex flex-initial font-serif text-xs text-slate-300">#{{$loop->index + 1}}</span>
            </div>
        </class>
    </x-white-box>
    @endforeach
    <x-white-box>
        @if(Auth::user() !== null)
        <x-form class="m-4 self-stretch flex-1" method="post" route="{{route('messages.store', $thread->id)}}" title="New reply" submit="reply">
            <x-form-trix-field name="body" label="Body" :errors="$errors" value="" />
            <input type="hidden" id="thread_id" name="thread_id" value="{{$thread->id}}">
        </x-form>
        @else
        <span class="flex">Login to be able to reply.</span>
        @endif
    </x-white-box>
</x-site-layout>