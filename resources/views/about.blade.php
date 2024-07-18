<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>News Website</title>
    <style>
        /* Custom styles */
        nav a:hover {
            color: #FFEB3B; /* Bright hover color */
        }
        .dropdown-menu a:hover {
            background-color: #E0E0E0; /* Dropdown hover background color */
        }
        #kategori:hover {
            color: #FFEB3B; /* Custom hover color for category */
        }
        .news-card {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .news-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .news-card .content {
            padding: 10px;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">

    <!-- Navbar -->
    <nav class="bg-black text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-lg font-semibold hover:underline">News</a>

            <!-- Hamburger Icon for Mobile -->
            <div x-data="{ open: false }" class="block md:hidden">
                <button @click="open = !open" class="focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Navbar center and right -->
            <div :class="{'block': open, 'hidden': !open}" class="w-full md:flex md:items-center md:justify-center md:w-auto hidden">
                <ul class="flex flex-col md:flex-row md:space-x-4">
                    <li><a href="{{ url('/') }}" class="text-lg font-semibold hover:underline">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-lg font-semibold hover:underline">About</a></li>
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-lg font-semibold hover:underline" id="kategori">Categories</button>
                        <ul x-show="open" @click.away="open = false" class="absolute mt-2 w-48 bg-white text-black shadow-lg rounded-md py-2 z-50">
                            <li><a href="{{ url('/crime') }}" class="block px-4 py-2 hover:bg-gray-100">Crime</a></li>
                            <li><a href="{{ url('/finance') }}" class="block px-4 py-2 hover:bg-gray-100">Finance</a></li>
                            <li><a href="{{ url('/politics') }}" class="block px-4 py-2 hover:bg-gray-100">Politics</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="flex flex-col md:flex-row md:space-x-4 md:ml-4">
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{ url('/home') }}" class="text-sm font-semibold hover:underline">Home</a></li>
                    @else
                    <li><a href="{{ route('login') }}" class="text-sm font-semibold hover:underline">Log in</a></li>
                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="text-sm font-semibold hover:underline">Register</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main container to center content and ensure minimal screen height -->
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Responsive grid container -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <!-- Grid with two columns on medium screens and one column by default -->
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!-- Left column with padding -->
                    <div class="p-6">
                        <!-- Flex container to align icon and text -->
                        <div class="flex items-center">
                            <!-- Example SVG icon -->
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <!-- SVG content -->
                            </svg>
                            <!-- Documentation link with styling -->
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a>
                            </div>
                        </div>
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Laravel has outstanding documentation, covering every aspect of this framework...
                            </div>
                        </div>
                    </div>
                    <!-- Right column with border on medium screens -->
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <!-- SVG content -->
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a>
                            </div>
                        </div>
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development...
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent News Section -->
            <div class="mt-8">
                <h2 class="text-2xl font-semibold mb-4">Recent News</h2>
                <div class="news-card">
                    <div class="content">
                        <h3 class="text-lg font-semibold mb-2">Breaking News Title</h3>
                        <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero et metus feugiat, ac mollis metus eleifend.</p>
                    </div>
                    <img src="" alt="News Image">
                </div>
                <div class="news-card">
                    <div class="content">
                        <h3 class="text-lg font-semibold mb-2">Another News Title</h3>
                        <p class="text-sm text-gray-600">Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                    </div>
                    <img src="" alt="News Image">
                </div>
            </div>

            <!-- Footer with version information -->
            <footer class="mt-8 bg-white dark:bg-gray-800 text-center w-full py-4">
                &copy; Copyright by Wabkor 2024
            </footer>
        </div>
    </div>

</body>

</html>
