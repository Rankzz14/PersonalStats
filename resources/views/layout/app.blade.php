<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rankzz Personal Stats</title>
    @Vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&family=Manrope:wght@200..800&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>

</head>

<body class="flex flex-col min-h-screen bg-white dark:bg-slate-900 text-black dark:text-white">
    <div id="top"></div>

    <nav class="bg-white text-black dark:bg-slate-900 dark:text-white fixed top-0 inset-x-0 z-50 px-52 flex">
        <a href="/" class="items-center flex justify-start mt-2">
            <img src="{{ asset('images/RankzzLogo.png') }}" class="h-14 rounded-xl">
        </a>

        <div class="justify-center flex mx-auto">
            <ul class="items-center flex space-x-4">
                <li>
                    <a href="#hero">Welcome</a>
                </li>
                <li>
                    <a href="/stats">Stats</a>
                </li>
                <li>
                    <a href="/lists">Lists</a>
                </li>
                <li>
                    <a href="/profile">Profile</a>
                </li>
            </ul>

        </div>

        <div class="justify-end items-center flex space-x-3 ">
            <button id="darkModeToggle"><i data-lucide="moon" class="size-8 rounded-full bg-purple-700 text-white p-1.5"></i></button>
            @auth
                <a href="/profile">{{ $user->username }}</a>
            @endauth
            @guest
                <a href="/login" class="px-4 py-2 bg-mavi text-white rounded-md shadow-md">Login</a>
            @endguest
        </div>
    </nav>

    <div class="mt-16">
        @yield('content')
    </div>

    <footer class="">

    </footer>

    @yield('script')
    <script src="https://unpkg.com/lucide@latest"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const htmlElement = document.documentElement;
            const storedTheme = localStorage.getItem('theme');

            if (storedTheme === 'dark') {
                htmlElement.classList.add('dark');
            } else if (storedTheme === 'light') {
                htmlElement.classList.remove('dark');
            }

            const toggleButton = document.getElementById('darkModeToggle');
            toggleButton.addEventListener('click', () => {
                if (htmlElement.classList.contains('dark')) {
                    htmlElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    htmlElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            });
            lucide.createIcons();
        });
    </script>
</body>

</html>
