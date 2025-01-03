<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
{
    // search query
    $search = $request->input("search");

    if ($search) {
        $users = User::where("name", "like", "%$search%")
            ->orWhere("email", "like", "%$search%")
            ->orWhere("created_at", "like", "%$search%")
            ->simplePaginate(5);
    } else {
        $users = User::simplePaginate(5);
    }

    return view('management.user.index', ['users' => $users]);
}

    public function show(User $user)
    {
        return view('management.user.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        return view('management.user.edit', ['user' => $user]);
    }

    public function update(User $user)
    {
        request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'role' => 'required|string|in:admin,employee,customer',
        ]);

        $user->update(request()->only(['name', 'email', 'role']));



        return redirect()->route('management.user.show', $user->user_id);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('management.user.index');
    }
}
