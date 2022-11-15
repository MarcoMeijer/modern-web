<div>
    <h2 class="text-lg font-bold mb-4">{{$title}}</h2>
    <form method="{{$method}}" action="{{$route}}" class="flex flex-col">
        @csrf

        {{$slot}}

        <button type="submit" class="flex self-start p-2 bg-green-500 text-green-50 rounded-md">{{$submit}}</button>
    </form>

</div>