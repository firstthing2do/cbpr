@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="bg-gray-100 p-6 rounded-lg shadow">
    <h1 class="text-2xl font-light mb-6">Welcome to Contact Book Dashboard!!</h1>
    <a href="{{route('contacts.index')}}" class="bg-white font-bold p-4 rounded-lg hover:bg-gray-300">Manage Contacts</a>
    <h2 class="text-lg font-semibold mt-6">Your Recent Contacts</h2>
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone Number</th>
                <th class="p-3 text-left">Notes</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($recentContacts as $recentContact)
            <tr class="border-b">
                <td class="p-3">{{$recentContact->name}}</td>
                <td class="p-3">{{$recentContact->email}}</td>
                <td class="p-3">{{$recentContact->phone_number}}</td>
                <td class="p-3">{{$recentContact->notes}}</td>
            </tr>
            @empty
            <tr><td colspan="4" class="p-3 text-center">No recent contacts found</td></tr>
            @endforelse
        </tbody>
    </table>
    @if ($totalContacts)
    <p class="text-sm block text-gray-500">Number of total contacts: {{$totalContacts}}</p>
    @else
    <p class="text-sm block text-gray-300">No contacts available</p>
    @endif
</div>
@endsection