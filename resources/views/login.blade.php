<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<link>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Laravel</title>
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
@vite('resources/css/app.css')
</head>

<body class="antialiased">

    {{-- NAVBAR --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex items-center justify-between p-4">
            <a href="https://flowbite.com/" class="flex items-center">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Tinylink Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Tiny Link</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:inline-block sm:inline-block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="bg-white border-gray-200 dark:bg-gray-900 py-20 min-h-[85.8vh] items-center justify-center">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="md:w-1/2 lg:w-11/12">
                    <div class="shadow p-6">
                        <h3 class="text-center text-white text-lg font-bold mb-4">Login</h3>
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="mb-4">
                                <input type="text" placeholder="Email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" name="email" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-4">
                                <input type="password" placeholder="Password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" class="bg-gray-800 text-white py-2 px-4 rounded w-full">Login</button>
                            </div>
                            <div class="text-center mt-4">
                                <a href="{{ route('register-user') }}" class="text-blue-700">Don't have an account? Register</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="text-sm">
                <p>&copy; 2023 Tiny-Link. All rights reserved.</p>
                <p>Created with ❤️ by Mrudul Patel</p>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-white hover:text-gray-400">Privacy Policy</a>
                <a href="#" class="text-white hover:text-gray-400">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>

</html>
