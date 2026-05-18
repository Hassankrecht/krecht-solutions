<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(15);
        return view('admin.admin-users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.admin-users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'is_admin' => 'required|boolean',
        ]);

        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect()->route('admin.admin-users.index')->with('status', 'User permissions updated');
    }
}
