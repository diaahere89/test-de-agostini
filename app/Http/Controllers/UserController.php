<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        ]);

        $user->update($request->only('email'));

        return redirect()->route('users.show', $user)->with('success', 'User updated successfully');
    }
}