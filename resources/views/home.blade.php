<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
    <style>
        nav a:hover {
            color: #FFEB3B; /* Warna hover cerah */
        }
        .dropdown-menu a:hover {
            background-color: #E0E0E0; /* Warna latar belakang hover dropdown */
        }
        #kategori:hover{
            color: #FFEB3B;
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
            
            <!-- Navbar tengah dan kanan -->
            <div :class="{'block': open, 'hidden': !open}" class="w-full md:flex md:items-center md:justify-center md:w-auto hidden">
                <ul class="flex flex-col md:flex-row md:space-x-4">
                    <li><a href="{{ url('/') }}" class="text-lg font-semibold hover:underline">Home</a></li>
                    <li><a href="{{ url('/about') }}" class="text-lg font-semibold hover:underline">About</a></li>
                    <li x-data="{ open: false }" class="relative">
                        <button @click="open = !open" class="text-lg font-semibold hover:underline" id="kategori">Kategori</button>
                        <ul x-show="open" @click.away="open = false" class="absolute mt-2 w-48 bg-white text-black shadow-lg rounded-md py-2 z-50">
                            <li><a href="{{ url('/kriminal') }}" class="block px-4 py-2 hover:bg-gray-100">Kriminal</a></li>
                            <li><a href="{{ url('/finance') }}" class="block px-4 py-2 hover:bg-gray-100">Finance</a></li>
                            <li><a href="{{ url('/politik') }}" class="block px-4 py-2 hover:bg-gray-100">Politik</a></li>
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

    <!-- Kontainer utama untuk menengahakan konten dan mencakup tinggi layar minimal -->
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <!-- Kontainer grid responsif -->
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <!-- Grid dengan dua kolom pada layar sedang dan satu kolom secara default -->
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <!-- Kolom kiri dengan padding -->
                    <div class="p-6">
                        <!-- Kontainer flex untuk menyelaraskan ikon dan teks -->
                        <div class="flex items-center">
                            <!-- Contoh ikon SVG -->
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <!-- Konten SVG -->
                            </svg>
                            <!-- Tautan dokumentasi dengan styling -->
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a>
                            </div>
                        </div>
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Laravel memiliki dokumentasi yang luar biasa, lengkap mencakup setiap aspek dari framework ini...
                            </div>
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                                <!-- Konten SVG -->
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold">
                                <a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a>
                            </div>
                        </div>
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                Laracasts menawarkan ribuan tutorial video tentang Laravel, PHP, dan pengembangan JavaScript...
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer dengan informasi versi -->
            <footer class="mt-8 bg-white dark:bg-gray-800 text-center w-full py-4">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </div>
</body>
</html>
