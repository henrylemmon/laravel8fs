@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <div>
                <header class="flex items-center mb-4">
                    <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="" width="40" height="40"
                         class="rounded-full">
                    <h2 class="ml-3">Want to participate?</h2>
                </header>

                <x-form.field>
                    <x-form.textarea
                        name="body"
                    ></x-form.textarea>
                </x-form.field>
                <div class="flex justify-end">
                    <x-form.button>
                        Post Comment
                    </x-form.button>
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
