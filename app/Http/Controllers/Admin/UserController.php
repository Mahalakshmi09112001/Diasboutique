<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully!');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

   public function edit($id)
{
    $user = User::findOrFail($id);  // Fetch the user by ID
    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, $id)
{
    // Validate the input, including userType
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'user_type' => 'required|in:user,admin',  // Validate user_type
    ]);

    $user = User::findOrFail($id);
    $user->name = $validated['name'];
    $user->email = $validated['email'];
    $user->UserType = $validated['user_type'];  // Update user_type
    $user->save();

    // Redirect back with a success message
    return redirect()->route('admin.users.index')->with('success', 'User updated successfully!');
}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
    }
}
