@props(['name'])

<x-form.field>
    <x-form.label
        name="{{ $name }}"
    ></x-form.label>

    <input  class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
            name="{{ $name }}"
            id="{{ $name }}"
            {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error
        name="{{ $name }}"
    ></x-form.error>
</x-form.field>
