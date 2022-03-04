<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    <a href="{{ route('home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
    @auth
        <a href="{{ route('logout') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Log out</a>
    @else
        <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
        @endif
    @endauth
</div>
