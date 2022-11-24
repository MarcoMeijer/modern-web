@props(['name', 'label', 'errors', 'value', 'class' => '', 'type' => 'text'])
<div class="{{$class}}">
    <x-input-label :for="$name" :value="__($label)" />
    <x-text-input :id="$name" :name="$name" :type="$type" class="mt-1 block w-full" :value="old($name, $value)" required autofocus :autocomplete="$name" />
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
    {{ $slot }}
</div>