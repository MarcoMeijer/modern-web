@props(['id', 'name', 'value' => ''])

<div class="flex flex-col pb-4">
    <input type="hidden" name="{{ $name }}" id="{{ $id }}_input" value="{{ $value }}" />

    <trix-editor id="{{ $id }}" input="{{ $id }}_input" {{ $attributes->merge(['class' => 'flex trix-content rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) }}></trix-editor>
</div