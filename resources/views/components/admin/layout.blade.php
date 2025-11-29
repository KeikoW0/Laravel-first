<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'School' }}</title>
    <style>[x-cloak]{display:none!important}</style>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <x-admin.sidebar />
    <div class="md:ml-64 min-h-screen flex flex-col">
        <x-admin.navbar />
        <main class="flex-1 p-6 max-w-7xl mx-auto w-full pt-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>