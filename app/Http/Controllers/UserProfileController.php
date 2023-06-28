<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|integer|',
        ]);

        // Create a new user profile
        $user = new UserProfile();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->save();

        // Optionally, you can redirect the user to their profile page
        return redirect()->route('profile.show', $user->id);
    }
    public function show()
{
    $user = UserProfile::findOrFail(auth()->user()->id);

    return view('profile', compact('user'));
}

}
