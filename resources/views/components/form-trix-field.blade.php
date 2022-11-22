@props(['name', 'label', 'errors', 'value'])
<div>
    <x-input-label :for="$name" :value="__($label)" />
    <x-trix-field :id="$name" :name="$name" value="{!! old($name, $value === '' ? '' : $value->toTrixHtml()) !!}" />
    <x-input-error class="mt-2" :messages="$errors->get($name)" />
    {{ $slot }}
</div>