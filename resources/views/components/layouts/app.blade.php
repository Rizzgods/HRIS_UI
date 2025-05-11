<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'HRIS Payroll' }}</title>
    
    <!-- Flatpickr CSS and JavaScript -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Load application CSS/JS from Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-50 text-gray-900 font-sans">
    <div x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <x-sidebar />

        <!-- Page Content -->
        <div class="transition-all duration-300" :class="{ 'ml-64': sidebarOpen, 'ml-16': !sidebarOpen }">
            <!-- Main Content -->
            <main class="p-4 md:p-6 min-h-screen bg-white shadow-sm rounded-lg mx-2 my-2">
                {{ $slot }}
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>