<x-layout>
    <section class="px-6 py-8">
        <div class="max-w-lg mx-auto mt-6 bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register" class="mt-10">
                @csrf
                <div class="mt-4">
                    <label for="name">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="w-full mt-1 py-1 px-3 rounded border border-gray-200 focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ old('name') }}"
                    >
                    @error('name')
                    <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="username">Username</label>
                    <input
                        type="username"
                        id="username"
                        name="username"
                        class="w-full mt-1 py-1 px-3 rounded border border-gray-200 focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ old('username') }}"
                    >
                    @error('username')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="w-full mt-1 py-1 px-3 rounded border border-gray-200 focus:outline-none focus:ring focus:border-blue-300"
                        value="{{ old('email') }}"
                    >
                    @error('email')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="mt-4">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full mt-1 py-1 px-3 rounded border border-gray-200 focus:outline-none focus:ring focus:border-blue-300"
                    >
                    @error('password')
                        <span class="text-red-500 text-xs italic" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mt-4">
                    <label for="password_confirmation">Confirm Password</label>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="w-full mt-1 py-1 px-3 rounded border border-gray-200 focus:outline-none focus:ring focus:border-blue-300"
                    >
                </div>

                <div class="mt-10">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg text-white py-1 px-4 focus:outline-none">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layout>
