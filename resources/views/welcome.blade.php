<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Employee Room Access System</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Inter', sans-serif;
                }

                body {
                    background: linear-gradient(145deg, #f0f4f8, #ffffff);
                    min-height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    padding: 2rem;
                }

                .card {
                    background: white;
                    padding: 2.5rem;
                    border-radius: 2rem;
                    box-shadow: 0 12px 30px rgba(0,0,0,0.08);
                    max-width: 540px;
                    width: 100%;
                    text-align: center;
                }

                .card h1 {
                    font-size: 2rem;
                    font-weight: 800;
                    margin-bottom: 1rem;
                    color: #1e293b;
                }

                .card p {
                    font-size: 1rem;
                    color: #475569;
                    margin-bottom: 2rem;
                }

                .links {
                    display: flex;
                    flex-direction: column;
                    gap: 1rem;
                }

                .links a {
                    background: #1d4ed8;
                    color: white;
                    text-decoration: none;
                    padding: 0.75rem 1.25rem;
                    border-radius: 1rem;
                    font-weight: 600;
                    transition: background 0.2s;
                }

                .links a:hover {
                    background: #2563eb;
                }

                footer {
                    margin-top: 2rem;
                    font-size: 0.875rem;
                    color: #94a3b8;
                }
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="card">
            <h1>Employee Room Access API</h1>
            <p>Simple and secure system to manage employee room access schedules.</p>

            <div class="links">
                <a href="https://github.com/suren-hov/employee-access" target="_blank">GitHub Source Code</a>
                <a href="/postman/EmployeeRoomAccess.postman_collection.json" download>Download Postman Collection</a>
                <a href="/api/free-rooms?day_of_week=monday&time=11:00" target="_blank">Try API (Get Free Rooms Now)</a>
            </div>

            <footer>
                Made by Suren Hovhannisyan — Laravel 12 ✨
            </footer>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
