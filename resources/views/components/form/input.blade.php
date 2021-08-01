@props([
    'name',
    'type' => 'text'
])

<x-form.field>
    <x-form.label
        name="{{ $name }}"
    ></x-form.label>

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
           class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
           value="{{ old($name) }}"
    >

    <x-form.error
        name="{{ $name }}"
    ></x-form.error>
</x-form.field>
