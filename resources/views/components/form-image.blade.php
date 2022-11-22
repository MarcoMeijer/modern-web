@props(['name', 'label', 'errors', 'value'])
<div>
    <x-input-label :for="$name" :value="__($label)" />
    <input type="file" :id="$name" :name="$name" accept="image/*" />
    <img class="shadow-md h-32 w-32 rounded" src="{{$value}}" alt="">
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
</div>