<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-md mx-auto">
            <h3 class="font-semibold text-2xl">Create Post</h3>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <div class="mt-4">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
                           value="{{ old('title') }}"
                    >
                    @error('title')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="slug">Slug</label>
                    <input type="text" id="slug" name="slug"
                           class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
                           value="{{ old('slug') }}"
                    >
                    @error('slug')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" id="thumbnail" name="thumbnail" class="w-full mt-1 py-1">
                </div>

                <div class="mt-4">
                  <label for="excerpt">Excerpt</label>
                  <textarea id="excerpt" name="excerpt"
                            class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
                  >{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                  <label for="body">Body</label>
                  <textarea id="body" name="body" class="w-full mt-1 py-1 px-3 rounded border border-gray-200"
                  >{{ old('body') }}</textarea>
                    @error('body')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="category_id"  class="block">Category</label>
                    <select name="category_id" id="category_id" class="mt-1">
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Publish
                    </button>
                </div>
            </form>
        </x-panel>
    </section>
</x-layout>
