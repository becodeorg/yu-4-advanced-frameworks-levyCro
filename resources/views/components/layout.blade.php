<!doctype html>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
<title>Laravel Holidays Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">  
 @vite('resources/css/app.css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<style>
    html{
        scroll-behavior: smooth;
    }
</style>


<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/travel-stories.png" alt="Laracasts Logo" width="300" height="100">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">

                @auth

                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                    </x-slot>

                    @can('admin')
                        <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Dashboard</x-dropdown-item>
                        <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New Post</x-dropdown-item>
                    @endcan

                </x-dropdown>

                <form action="/logout" method="post" class="text-xs font-semibold text-green-500 ml-6">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
                    
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth

                <a href="#newsletter" class="bg-green-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe For newsletter
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-green-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/mail.png" alt="" class="mx-auto mb-6" style="width: 145px;">
            <h5 class="text-3xl text-green-600">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-green-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div>
                                <input id="email" type="text" placeholder="Your email address" name="email"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">                               
                            </div>
                        </div>

                        <button type="submit"
                                class="transition-colors duration-300 bg-green-500 hover:bg-green-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                        >
                            Subscribe
                        </button>
                    </form>
                     @error ('email')
                       <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </footer>
    </section>

    <x-flash />
</body>
