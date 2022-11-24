@props(['user'])
<a href="{{route('profile.show', $user->id)}}">
    <img class="flex h-8 w-8 rounded" src="{{$user->profile->getImageUrl('thumbnail')}}" alt="">
</a>