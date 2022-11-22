@props(['name', 'label', 'errors', 'value'])
<div>
    <x-input-label :for="$name" :value="__($label)" />
    <x-text-input :id="$name" :name="$name" type="text" class="mt-1 block w-full" :value="old($name, $value)" required autofocus :autocomplete="$name" />
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
    {{ $slot }}
</div>