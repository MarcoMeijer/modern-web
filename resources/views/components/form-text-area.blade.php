@props(['name', 'label', 'placeholder', 'errors', 'value'])
<div class="mt-2 mb-4">
    <div class="flex flex-row">
        <label class="w-24 text-gray-500 text-sm" for="{{$name}}">{{$label}}</label>
        <textarea name="{{$name}}" placeholder="{{$placeholder}}" class="flex-1 border border-gray-400 rounded-sm p-1">{{ old($name, $value)  }}</textarea>
    </div>
    <x-form-error name="{{$name}}" :errors="$errors" />
</div>