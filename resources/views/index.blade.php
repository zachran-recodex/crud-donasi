<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100">

    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Donasi
            </h2>
        </div>
    </header>

    <!-- Page Content -->
    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Card 1 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Donasi 1">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Donasi Pendidikan</h3>
                        <p class="text-gray-600 text-sm mt-2">Membantu anak-anak mendapatkan akses pendidikan.</p>
                        <div class="mt-4">
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Donasi 2">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Donasi Lingkungan</h3>
                        <p class="text-gray-600 text-sm mt-2">Dukung pelestarian lingkungan dan penghijauan.</p>
                        <div class="mt-4">
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Donasi 3">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Donasi Kesehatan</h3>
                        <p class="text-gray-600 text-sm mt-2">Menyediakan layanan kesehatan untuk masyarakat kurang mampu.</p>
                        <div class="mt-4">
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Donasi 4">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">Donasi Bencana</h3>
                        <p class="text-gray-600 text-sm mt-2">Bantu korban bencana alam memulihkan kehidupan mereka.</p>
                        <div class="mt-4">
                            <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Donasi Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Postingan Section -->
            <div class="mt-10">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Postingan Terbaru</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Post 1 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Post 1">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">Judul Postingan 1</h3>
                            <p class="text-gray-600 text-sm mt-2">Deskripsi singkat mengenai postingan ini.</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <!-- Post 2 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Post 2">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">Judul Postingan 2</h3>
                            <p class="text-gray-600 text-sm mt-2">Deskripsi singkat mengenai postingan ini.</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <!-- Post 3 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Post 3">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">Judul Postingan 3</h3>
                            <p class="text-gray-600 text-sm mt-2">Deskripsi singkat mengenai postingan ini.</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <!-- Post 4 -->
                    <div class="bg-white shadow-md rounded-lg overflow-hidden">
                        <img class="w-full h-48 object-cover" src="https://via.placeholder.com/150" alt="Post 4">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800">Judul Postingan 4</h3>
                            <p class="text-gray-600 text-sm mt-2">Deskripsi singkat mengenai postingan ini.</p>
                            <div class="mt-4">
                                <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
</body>
</html>
