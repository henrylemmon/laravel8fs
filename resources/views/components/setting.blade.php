@props(['heading'])

<section class="px-6 py-8">
    <h3 class="font-semibold mb-8 pb-4 border-b text-2xl">{{ $heading }}</h3>
    <div class="flex">
        <aside class="w-48">
            <h4 class="font-semibold mb-6 uppercase">Links</h4>
            <ul>
                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">
                        New Post
                    </a></li>

                <a href="/admin/dashboard" class="{{ request()->is('admin/dashboard') ? 'text-blue-500' : '' }}">
                    Dashboard
                </a></li>
            </ul>
        </aside>

        <main class="flex-1">
            <x-panel class="max-w-4xl mx-auto">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
