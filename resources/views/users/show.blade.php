@extends('layouts.app')

@php
    $header = 'User Details';
@endphp

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <div class="bg-white shadow-lg rounded-lg p-8">
        <h5 class="text-2xl font-bold mb-4 text-gray-800">Username: {{ $user->username }}</h5>
        <p class="text-gray-600 mb-2"><span class="font-semibold">Email:</span> {{ $user->email }}</p>
        <p class="text-gray-600 mb-2"><span class="font-semibold">Registered on:</span> {{ $user->created_at->format('d/m/Y') }}</p>
        <p class="text-gray-600 mb-6"><span class="font-semibold">Is Admin:</span> {{ $user->isAdmin() ? 'Yes' : 'No' }}</p>
        <div class="flex space-x-4">
            <a href="{{ route('users.edit', $user) }}" class="bg-blue-600 hover:bg-blue-700 font-semibold py-2 px-4 rounded transition">Edit Email</a>
            <a href="{{ route('users.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded transition">Back to List</a>
        </div>
    </div>
</div>
@endsection