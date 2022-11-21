@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 bg-gray-100 p-2 border-b-2 focus:ring-indigo-500 rounded-md shadow-sm']) !!}>
</textarea>