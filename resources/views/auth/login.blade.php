@extends('layouts.app')
@section('title', 'Login')
@section('content')
<h1 class="font-extralight">Welcome To Your Very Own Contact Book Application!!</h1>
<div class="flex items-center justify-center mt-[7%]">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" required
                class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700 sm:text-sm
                @error('email') border-red-500 @enderror">
                @error('email') <p class="text-red-500">{{$message}}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" id="password" required
                class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700 sm:text-sm
                @error('password') border-red-500 @enderror">
                @error('password') <p class="text-red-500 text-sm">{{$message}}</p> @enderror
        </div>
        <button type="submit"
            class="w-full bg-amber-700 text-white py-2 px-4 rounded-md hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-500">
            Login
        </button>
    </form>
    <p class="mt-4 text-sm text-center text-gray-600">
        Don't have an account? <a href="{{ route('register') }}" class="text-amber-800 hover:underline">Register</a>
    </p>
</div>
</div>
@endsection