<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>

    @if (file_exists(public_path('hot')) || file_exists(public_path('build/manifest.json')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Content -->
    <main class="flex-grow p-6">
        <div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-lg">
            @yield('content')
        </div>
    </main>

    <footer class="text-center text-sm text-gray-400 py-4 border-t mt-6">
        Basta Task ni Dion | &copy; {{ date('Y') }}
    </footer>

</body>
</html>