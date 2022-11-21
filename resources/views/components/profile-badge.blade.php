@props(['user'])
<div class="flex flex-col w-44 items-center">
    <a class="flex flex-col items-center" href="{{route('profile.show', $user->id)}}">
        <img class="shadow-md h-32 w-32 rounded border-2 border-white" src="{{$user->profile->media->first()->getUrl('big')}}" alt="">
        <span class="font-semibold">{{$user->username}}</span>
    </a>
    <span class="text-xs text-slate-400 p-1 text-center border-t border-slate-100">Member since <br /> {{$user->email_verified_at}}</span>
    <span class="text-xs text-slate-400 m-1">Messages posted: {{count($user->messages)}}</span>
</div>