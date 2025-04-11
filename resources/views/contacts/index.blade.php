@extends('layouts.app')
@section('title', 'Contacts')
@section('content')
<div class="bg-gray-100 p-6 rounded-lg shadow grid md:grid-cols-1 sm:grid-cols-1 lg:grid-cols-1">
    <div class="flex justify-between items-center mb-4 sm:grid-cols-2">
        <h1 class="text-2xl font-light">Contacts</h1>
        <a href="{{route('contacts.create')}}" class="bg-white px-4 py-2 rounded hover:bg-gray-300">Add a Contact</a>
    </div>
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200 rounded">
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone Number</th>
                <th class="p-3 text-left">Notes</th>
                <th class="p-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($contacts as $contact)
            <tr class="border-b">
                <td class="p-3">{{$contact->name}}</td>
                <td class="p-3">{{$contact->email}}</td>
                <td class="p-3">{{$contact->phone_number}}</td>
                <td class="p-3">{{$contact->notes}}</td>
                <td class="p-3 flex space-x-2">
                    <a href="{{route('contacts.edit', $contact->id)}}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                    <form action="{{route('contacts.destroy', $contact->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                    </form>
                </td>
                @empty
                <tr><td colspan="5" class="p-3 text-center">No Contact Available</td></tr>
                @endforelse
        </tbody>
    </table>
    <div class="px-4 py-3">
        {{$contacts->links()}}
    </div>
</div>
@endsection