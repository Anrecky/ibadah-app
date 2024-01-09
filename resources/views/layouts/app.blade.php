<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Informasi Bantuan Dana Hibah') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        <livewire:layout.navigation />

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.feather.replace();

            const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const themeToggleBtn = document.getElementById('theme-toggle');
            const themeToggleIcon = document.getElementById('theme-toggle-icon');

            themeToggleBtn.addEventListener('click', function() {
                const colorTheme = localStorage.getItem('color-theme');

                if (colorTheme === 'dark' || colorTheme === null) {
                    localStorage.setItem('color-theme', 'light');
                } else {
                    localStorage.setItem('color-theme', 'dark');
                }

                // Update the dark mode icon
                setupDarkModeIcon(localStorage.getItem('color-theme'));
                document.documentElement.classList.toggle('dark', colorTheme === 'dark' ? true : false);
            });

            // Initial setup of dark mode icon
            setupDarkModeIcon(localStorage.getItem('color-theme'));

            function setupDarkModeIcon(colorTheme) {
                if (colorTheme === 'dark') {
                    themeToggleIcon.setAttribute('data-feather', 'moon');
                } else {
                    themeToggleIcon.setAttribute('data-feather', 'sun');
                }
                window.feather.replace();
            }
        });
    </script>

</body>

</html>
