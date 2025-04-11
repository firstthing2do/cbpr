@extends('layouts.app')
@section('title', 'Fill the form')
{{-- @section('title', {{ $contact->id ? 'Update Contact' : 'Create Contact' }}) --}}
@section('content')
<div class="bg-white p-6 rounded ml-[30%] shadow max-w-lg max-auto">
    <h1 class="text-2xl font-extralight mb-4">{{$contact->id ? 'Update Contact' : 'Create Contact'}}</h1>
    <form action="{{$contact->id ? route('contacts.update', $contact->id) : route('contacts.store')}}" method="POST">
        @csrf
        @if($contact->id) @method('PUT') @endif
        <div class="mb-4">
            <label for="name" class="block text-gray-700 text-sm">Name</label>
            <input type="text" name="name" id="name" value="{{old('name', $contact->name)}}" required
            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700
            @error('name') border-red-500 @enderror">
            @error('name') <p class="text-red-500 text-sm">{{$message}}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="{{old('email', $contact->email)}}" required
            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700
            @error('email') border-red-500 @enderror">
            @error('email') <p class="text-red-500 text-sm">{{$message}}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="phone_number" class="text-gray-700 block">Phone Number</label>
            <input type="text" name="phone_number" value="{{old('phone_number', $contact->phone_number)}}" id="phone_number" required placeholder="+250xxxxxxxxx"
            class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700
            @error('phone_number') border-red-500 @enderror">
            @error('phone_number') <p class="text-red-500 text-sm">{{$message}}</p> @enderror
        </div>
        <div class="mb-4">
            <label for="notes" class="text-sm text-gray-700">Notes</label>
            <textarea name="notes" id="notes" class="w-full py-2 px-3  border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-amber-700 @error('notes') border-red-500 @enderror"
            rows="3">
                {{old('notes', $contact->notes)}}
            </textarea>
            @error('notes') <p class="text-red-500 text-sm">{{$message}}</p> @enderror
        </div>
        <button type="submit" class="bg-amber-700 text-white py-2 px-4 rounded hover:bg-amber-900">
            {{$contact->id ? 'Update Contact' : 'Create Contact'}}
        </button>
    </form>
</div>
@endsection