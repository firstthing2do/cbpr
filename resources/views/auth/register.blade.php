@extends('layouts.app')
@section('title', 'Register')
@section('content')
<h1 class="font-extralight">Welcome To Your Very Own Contact Book Application!!</h1>
<div class="flex items-center justify-center mt-[2%]">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 focus:outline-none focus:ring-2 rounded-md shadow-sm focus:ring-amber-700 sm:text-sm">
                    @error('name') <p>{{$message}}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700 sm:text-sm">
                    @error('email')  <p>{{$message}}</p> @enderror
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700 sm:text-sm">
                    @error('password')  <p>{{$message}}</p> @enderror
            </div>
            <button type="submit"
                class="w-full bg-amber-700 text-white py-2 px-4 rounded-md hover:bg-amber-900 focus:outline-none focus:ring-2 focus:ring-amber-500">
                Register
            </button>
        </form>
        <p class="mt-4 text-sm text-center text-gray-600">
            Already have an account? <a href="{{ route('login') }}" class="text-amber-800 hover:underline">Login</a>
        </p>
    </div>
</div>
@endsection