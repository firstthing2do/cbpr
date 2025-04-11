<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="crsf-token" content="{{ csrf_token() }}">
    @yield('scripts')
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-mono">
    <header class="bg-gray-50 shadow p-4">
        <nav class="container mx-auto flex justify-between items-center border-b">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold">Contact Book</a>
            <div class="flex space-x-4 ">
                @auth
                    <a href="{{ route('contacts.index') }}" class="text-gray-700 hover:text-gray-900">Contacts</a>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-gray-900">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-gray-900">Register</a>
                @endauth
            </div>
        </nav>
        
    <main class="container mx-auto p-6">
    @yield('content')
    </main>
    <div class="container mx-auto grid justify-center grid-rows-2 items-center border-t">
        <p class="mt-2 text-gray-700">Developed by KNAX_250_ltd</p>
        <p class="ml-7 text-gray-700">Contact Book @2025</p>
    </div>
</body>
</html>