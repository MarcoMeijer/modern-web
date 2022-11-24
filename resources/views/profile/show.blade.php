<x-site-layout title="User {{ $user->username }}" page="Forum">
    <x-white-box class="flex-row">
        <div class="flex border-r border-slate-200 p-2">
            <x-profile-badge :user="$user" />
        </div>
        <div class="flex flex-col p-2">
            <h2 class="text-lg font-medium text-gray-900">Bio</h2>
            <p class="mt-1 text-sm text-gray-600">{!! $user->profile->bio !!}</p>
        </div>
    </x-white-box>
    <x-white-box class="flex-col p-4">
        <h2 class="text-lg font-medium text-gray-900">Latest messages by {{ $user->username }}</h2>
        @foreach($messages as $message)
        <div class="flex-col flex">
            <div class="flex items-stretch flex-row bg-white border-l border-r border-b border-solid border-slate-200 px-2 py-1 {{ $loop->index == 0 ? 'border-t' : ''}}">
                <div class="flex flex-row items-center">
                    <x-profile-thumbnail :user="$user" />
                    <div class="flex flex-col mx-1">
                        <a href="{{route('threads.show', $message->thread_id)}}">
                            <span class="flex font-semibold text-sm text-slate-700">{{Str::limit($message->body->toPlainText(), 70)}}</span>
                        </a>
                        <span class="flex font-serif text-xs text-slate-600">{{$message->published_at}}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </x-white-box>
</x-site-layout>