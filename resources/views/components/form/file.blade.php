@props([
'name',
'type' => 'file'
])

<x-form.field>
    <x-form.label
        name="{{ $name }}"
    ></x-form.label>

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
           class="w-full mt-1 py-1"
           value="{{ old($name) }}"
    >

    <x-form.error
        name="{{ $name }}"
    ></x-form.error>
</x-form.field>
