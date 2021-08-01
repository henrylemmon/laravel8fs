@props(['name'])

@error($name)
    <span class="text-red-500 text-xs italic" role="alert">
        {{ $message }}
    </span>
@enderror
