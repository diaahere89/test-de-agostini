@extends('layouts.app')

@php
    $header = 'User Management';
@endphp

@section('content')
    <div class="flex justify-center mt-8">
        <div class="w-full overflow-x-auto rounded-lg shadow max-w-4xl flex justify-center">
            <table class="min-w-full divide-y divide-gray-200 bg-white">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Username
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Is Admin
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Registered On
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->username }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->email }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->isAdmin() ? 'Yes' : 'No' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                        {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <a href="{{ route('users.show', $user) }}" class="inline-block bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200 transition mr-2 text-xs font-semibold">View</a>
                        <a href="{{ route('users.edit', $user) }}" class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded hover:bg-green-200 transition text-xs font-semibold">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        {{ $users->links() }}
    </div>
@endsection