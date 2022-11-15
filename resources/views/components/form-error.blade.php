@props(['name', 'errors'])

@error($name)
<div class="text-orange-600 bg-orange-50 rounded-sm p-1">
    @foreach ($errors->get($name) as $error)
    <li>{{ $error }}</li>
    @endforeach
</div>
@enderror