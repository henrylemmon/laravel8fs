@props([
    'name',
    'rows' => 3
])

<x-form.field>
    <x-form.label
        name="{{ $name }}"
    ></x-form.label>

    <textarea id="{{ $name }}" name="{{ $name }}"
              class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
              rows="{{ $rows }}"
    >{{ old($name) }}</textarea>

    <x-form.error
        name="{{ $name }}"
    ></x-form.error>
</x-form.field>
