<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // index
    public function index(Request $request)
    {
        // get all user with status active
        $users = DB::table('users')->when($request->keyword, function ($query) use ($request) {
            $query->where('name', 'like', "%{$request->keyword}%")
                ->orWhere('email', 'like', "%{$request->keyword}%")
                ->orWhere('phone', 'like', "%{$request->keyword}%");
        })->where('status', 'active')->orderBy('name')->paginate(5);
        return view('pages.users.index', compact('users'));
    }

    // create
    public function create()
    {
        return view('pages.users.create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'phone' => 'nullable|numeric',
            'role' => 'required|in:admin,staff,user',
        ]);

        $request['password'] = Hash::make($request->password);

        try {
            User::create($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create user');
        }
        return redirect()->back()->with('success', 'User created successfully');
    }

    // edit
    public function edit(User $user)
    {
        return view('pages.users.edit', compact('user'));
    }

    // update
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|numeric',
            'role' => 'required|in:admin,staff,user',
        ]);

        if ($request->has('password')) {
            $request['password'] = Hash::make($request->password);
        }

        try {
            $user->update($request->all());
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user');
        }
        return redirect()->back()->with('success', 'User updated successfully');
    }

    // destroy
    public function destroy(User $user)
    {
        try {
            // update user status to incative
            $user->update(['status' => 'inactive']);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete user');
        }
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
