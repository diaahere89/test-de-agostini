@extends('layouts.app')

@php
    $header = 'Edit User';
@endphp

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Username</label>
                <input
                    type="text"
                    class="w-full px-4 py-2 border border-gray-200 bg-gray-100 rounded"
                    value="{{ $user->username }}"
                    readonly
                    disabled
                >
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Is Admin</label>
                <input
                    type="text"
                    class="w-full px-4 py-2 border border-gray-200 bg-gray-100 rounded"
                    value="{{ $user->is_admin ? 'Yes' : 'No' }}"
                    readonly
                    disabled
                >
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Registered On</label>
                <input
                    type="text"
                    class="w-full px-4 py-2 border border-gray-200 bg-gray-100 rounded"
                    value="{{ $user->created_at->format('d/m/Y') }}"
                    readonly
                    disabled
                >
            </div>
            <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
            <input
                type="email"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400 transition"
                id="email"
                name="email"
                value="{{ old('email', $user->email) }}"
                required
            >
            @error('email')
                <div class="text-red-600 text-sm mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 font-bold py-2 px-6 rounded transition">
                Update
            </button>
            <a href="{{ route('users.show', $user) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded transition">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection