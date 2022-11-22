<div>
    <h2 class="text-lg font-bold mb-4">{{$title}}</h2>
    <form method="{{$method}}" action="{{$route}}" class="flex flex-col">
        @csrf

        {{$slot}}

        <x-primary-button class="flex self-start">{{$submit}}</x-primary-button>
    </form>

</div>