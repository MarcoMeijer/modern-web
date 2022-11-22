@props(['class' => '', 'title', 'submit', 'method', 'route'])
<div class="{{$class}}">
    <h2 class="text-lg font-bold mb-2">{{$title}}</h2>
    <form method="{{$method}}" action="{{$route}}" class="flex self-stretch flex-col mt-6 space-y-6">
        @csrf

        {{$slot}}

        <x-primary-button class="flex self-start">{{$submit}}</x-primary-button>
    </form>

</div>