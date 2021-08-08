<x-layout>
    <x-setting heading="Polish New Rost">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.file name="thumbnail" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.field>
                <select name="category_id" id="category_id" class="mt-1">
                    <option>Choose Category</option>
                    @foreach(\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category_id" />
            </x-form.field>

            <x-form.field>
                <x-form.button>Publish</x-form.button>
            </x-form.field>
        </form>
    </x-setting>
</x-layout>
