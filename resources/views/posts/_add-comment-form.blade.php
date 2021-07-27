@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <div>
                <header class="flex items-center">
                    <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" width="40" height="40"
                         class="rounded-full">
                    <h2 class="ml-3">Want to participate?</h2>
                </header>
                <div>
                    <textarea
                        name="body"
                        rows="5"
                        placeholder="Asshole"
                        class="w-full mt-1 py-1 px-3 rounded border border-gray-200 mt-4"></textarea>
                    @error('body')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none mt-4">
                        Post Comment
                    </button>
                </div>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold">
        <a href="/register" class="hover:underline text-blue-500">
            Register
        </a> or <a href="/login" class="hover:underline text-blue-500">
            Log in
        </a>
    </p>
@endauth
