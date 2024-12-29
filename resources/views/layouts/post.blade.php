<!DOCTYPE html>
<html lang="en">
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
<body class="bg-gray-100 text-gray-800">
<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-4">
        <a href="{{ route('posts.index') }}" class="text-2xl font-bold text-blue-500">Instagram Clone</a>
    </div>
</nav>
<main class="py-6">
    @yield('content')
</main>
</body>
</html>
